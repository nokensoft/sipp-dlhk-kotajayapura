@props(['title' => '', 'subtitle'=>'', 'id' => '', 'label' => '', 'name' => '', 'img' => '', 'isDisabled' => false])
@php
    $path = explode('.', $img);
    $extension = end($path);
    $isPdf = false;
    if ($extension === 'pdf') $isPdf = true;
@endphp
<h5>{{$title}}</h5>
<p class="mb-2">{{$subtitle}}</p>
@if($isDisabled)
    <div class="border-2 border-gray-400 rounded-xl h-[300px] cursor-default flex p-2 justify-center items-center">
        @if($isPdf)
            <iframe id="iframe-{{$id}}" src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" class="w-full h-full" type="text/pdf">Open the pdf!</iframe>
        @else
            <div class="flex flex-col">
                <img src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" alt="" class="mx-auto max-h-52" id="img-{{$id}}">
                <p class="mt-1 opacity-60">Support: jpeg, png, pdf</p>
                @if($img != '')
                    <button class="bg-[#4F46E5] text-white py-2 px-4 rounded-xl mt-2" type="button" wire:click.prevent="$dispatch('download', { img: {{json_encode($img)}} })">
                        <i class="fa-solid fa-arrow-down"></i>
                        Download
                    </button>
                @endif
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
                           this.isPdf = true;
                        }else{
                           document.getElementById(`img-${this.id}`).src = url+'/assets/img/others/upload.png';
                           this.isPdf = false;
                        }
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
                        <button x-show="file != ''" class="bg-red-500 text-white py-2 px-4 rounded-xl left-0 right-0 absolute  z-50" type="button" @click="deleteFile()" wire:click.prevent="$dispatch('delete-file', { name: id })">
                            <i class="fa-solid fa-trash"></i>
                            Hapus
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mb-6 mt-1">
        @error($name) <span class="text-red-400">{{ $message }}</span> @enderror
    </div>
@endif

