@props(['title' => '', 'subtitle'=>'', 'id' => '', 'label' => '', 'name' => '', 'img' => '', 'isDisabled' => false])
@php
    $filePath = storage_path('app/public/' . $img ?? '');
    $isPdf = false;
    if (file_exists($filePath)){
        $path = explode('.', $img);
        $extension = end($path);
        if ($extension === 'pdf') $isPdf = true;
    } else{
        $img = '';
    }
@endphp
<h5 class="text-sm font-medium text-gray-900">{{$title}}</h5>
<div class="flex items-center gap-2 mb-2">
    <p>{{$subtitle}}</p>
    @if($img != '')
        @if($isDisabled)
            <button id="download{{$id}}" class="text-[#4F46E5] hover:text-[#6f67ff]  py-1 px-2 rounded-lg text-xs" type="button" wire:click.prevent="$dispatch('download', { img: {{json_encode($img)}} })">
                <i class="fa-solid fa-download"></i>
                Download
            </button>
        @else
            <a id="preview{{$id}}" href="{{asset('storage/'.$img)}}" class="text-[#4F46E5] hover:text-[#6f67ff] py-1 px-2 rounded-lg text-xs" target="_blank">
                <i class="fa-solid fa-file"></i>
                Preview
            </a>
        @endif
    @endif

</div>
@if($isDisabled)
    <div class="border-2 border-gray-400 rounded-xl h-[300px] cursor-default flex p-2 justify-center items-center">
        @if($isPdf)
            <iframe id="iframe-{{$id}}" src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" class="w-full h-full" type="text/pdf">Open the pdf!</iframe>
        @else
            <div class="flex flex-col">
                <img src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" alt="" class="mx-auto max-h-52" id="img-{{$id}}">
                <p class="mt-1 opacity-60">Support: jpeg, png, pdf</p>
            </div>
        @endif
    </div>
@else
    <div class="upload upload-draggable h-[290px] relative @if(!$isDisabled) hover:border-primary-600 @endif @error($name) border-red-500 hover:border-red-500 @enderror">
        <div
            wire:ignore
            x-data="{
                    id: @js($id),
                    isPdf: @js($isPdf),
                    file: @js($img),
                    openModalDelete: false,
                    handleImageChange() {
                        const inputElement = document.getElementById(this.id);
                        const file = inputElement.files[0]; // Ambil file dari input
                        console.log(file)
                        if(file){
                            const reader = new FileReader();

                            reader.onload = (e) => {
                                const extension = inputElement.value.split('.')[1];
                                if (extension === 'pdf'){
                                    document.getElementById(`iframe-${this.id}`).src = e.target.result;
                                    this.isPdf = true;
                                }else{
                                    document.getElementById(`img-${this.id}`).src = e.target.result;
                                    this.isPdf = false;
                                }
                                this.file = e.target.result;
                            };

                            reader.readAsDataURL(file);
                        }
                    },
                    deleteFile(){
                        const protocol = window.location.protocol+'//';
                        const hostname= window.location.hostname;
                        const port= window.location.port == '' ? '' : ':'+window.location.port;
                        const url = protocol+hostname+port;
                        console.log(url)
                        const inputElement = document.getElementById(this.id);
                        const extension = inputElement.value.split('.')[1];
                        if (extension === 'pdf'){
                           document.getElementById(`iframe-${this.id}`).src = url+'/assets/img/others/upload.png';
                        }else{
                           document.getElementById(`img-${this.id}`).src = url+'/assets/img/others/upload.png';
                        }
                        this.isPdf = false;
                        this.file = '';
                    }
                 }"
        >
            <label class="form-label"></label>
            <div>
                <input class="upload-input draggable z-20" type="file" id="{{$id}}" @change="handleImageChange" wire:model="{{$name}}">
                <div class="my-16 text-center relative">
                    <iframe x-show="isPdf" id="iframe-{{$id}}" src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" class="w-full text-center" type="text/pdf">Open the pdf!</iframe>
                    <img x-show="!isPdf" src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" alt="" class="mx-auto max-h-36" id="img-{{$id}}">
                    @if(!$isDisabled)
                        <p class="font-semibold">
                            <span class="text-gray-800">drop file {{$label}} anda disini, atau</span>
                            <span class="text-blue-500">pilih</span>
                        </p>
                        <p class="mt-1 opacity-60">Support: jpeg, png, pdf</p>
                        <button x-show="file != ''" class="text-red-600 hover:text-red-500 py-1.5 px-2 rounded-lg absolute -translate-x-1/2 z-50 text-xs" type="button" x-on:click="openModalDelete=true" id="hapus{{$id}}">
                            <i class="fa-solid fa-trash"></i>
                            Hapus
                        </button>
                    @endif
                </div>
            </div>
            <!-- Modal Delete -->
            <x-modal-alpine modalName="openModalDelete" title="Peringatan!">
                <div class="p-4 py-6 text-center">
                    <i class="fa-solid fa-info-circle text-6xl text-rose-400"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-600">Apakah anda yakin ingin menghapus file ini?</h3>
                    <div class="my-3 flex gap-2 justify-center items-center">
                        <button @click="deleteFile(); openModalDelete=false;" wire:click.prevent="$dispatch('delete-file', { name: id })" data-modal-hide="popup-modal" type="button" class="text-rose-400">
                            Ya, saya yakin
                        </button>

                        <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button" class="btn btn-xs btn-solid">Tidak, batalkan</button>
                    </div>
                </div>
            </x-modal-alpine>
        </div>
    </div>
    <div class="mb-6 mt-1">
        @error($name) <span class="text-red-400">{{ $message }}</span> @enderror
    </div>
@endif

<script>
    tippy('#hapus'+@js($id), {
        content: 'HAPUS',
        theme: 'primary',
        zIndex: 99999
    });
    tippy('#download'+@js($id), {
        content: 'DOWNLOAD',
        theme: 'primary'
    });
    tippy('#preview'+@js($id), {
        content: 'PREVIEW',
        theme: 'primary'
    });
</script>

