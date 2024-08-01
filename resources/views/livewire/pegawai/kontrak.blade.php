<div class="mt-8">
    @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Berhasil </span> {{session()->get('success')}}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Gagal </span> {{session()->get('error')}}
        </div>
    @endif
        <div class="gap-4 flex-wrap p-3">
            <h1 class="font-bold text-xl">Petugas</h1>
            <p class="">Informasi biodata petugas lapangan</p>
        </div>
        <div class="p-3">
            <div class="form-item flex gap-2 ">
                <div class="w-1/5">
                        <img width="200" src="{{ asset('assets/img/others/upload.png')}}" alt="" class="" >
                </div>
                <div class="w-1/5 content-center">
                     <p class="font-bold text-xl text-black"> Nama Lengkap : <span></span></p>
                     <p class="font-bold text-xl text-black"> NIK : <span></span></p>
                </div>
            </div>
        </div>
        <hr class="border-[1px]">

        @can('edit')

        <div class="flex justify-between mt-5">
            <div class="flex gap-4 mb-4 items-center">
                <a href="#" class="btn btn-xs btn-solid" wire:click.prevent="$dispatch('actionKontrak')"><i class="fa-solid fa-plus"></i> Tambah</a>
                <a href="#" wire:click.prevent="actionKontrak('')" class="{{$menu === '' ? 'text-[#4F46E5] font-bold' : 'text-gray-500'}}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Semua ({{$totalAll}})</a>
                <a href="#" wire:click.prevent="actionKontrak('publik')" class="{{$menu === 'publik' ? 'text-[#4F46E5] font-bold' : 'text-gray-500'}}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Publik ({{$totalPublik}})</a>
                <a href="#" wire:click.prevent="actionKontrak('konsep')" class="{{$menu === 'konsep' ? 'text-[#4F46E5] font-bold' : 'text-gray-500'}}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Konsep ({{$totalKonsep}})</a>
                <a href="#" wire:click.prevent="actionKontrak('tempat_sampah')" class="{{$menu === 'tempat_sampah' ? 'text-[#4F46E5] font-bold' : 'text-gray-500'}}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Tempat Sampah ({{$totalTempatSampah}})</a>
            </div>
            <div>
                <button class="btn btn-sm hover:border-[#4F46E5] hover:text-[#4F46E5] hover: transition duration:200" type="button" wire:click="downloadPdf">
                    <span class="flex items-center justify-center">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span class="ltr:ml-1 rtl:mr-1">PDF</span>
                    </span>
                </button>

                <button class="btn btn-sm hover:border-[#4F46E5] hover:text-[#4F46E5] hover: transition duration:200 inline-block" type="button" wire:click="previewPdf">
                    <span class="flex items-center justify-center">
                        <i class="fa-solid fa-print"></i>
                        <span class="ltr:ml-1 rtl:mr-1">Cetak</span>
                    </span>
                </button>
            </div>
        </div>


        <div class="flex gap-1 items-center">

        </div>
        <!-- filter end -->
     @endcan
     <div class="relative shadow-md sm:rounded-lg mt-2 border p-2" x-data="{openModalDelete: false}" x-cloak>
        <div class="flex gap-4 flex-wrap">
            <div class="flex gap-4 z-50">
                <span>Status</span>
                <div
                    class="relative"
                    x-data="{
                        isSelectOpen:false,
                        select(){
                            this.isSelectOpen = false;
                        }
                    }"
                >
                    <div class="border p-2 w-26 cursor-pointer rounded-lg" :class="isSelectOpen ? 'border-gray-600' : 'border-gray-400'" @click="isSelectOpen = !isSelectOpen">
                        <span class="mr-1">Semua</span> <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="border absolute bg-white top-10 left-0 w-30 rounded-lg" x-show="isSelectOpen" @click.away="isSelectOpen = false">
                        @foreach($status as $s)

                            <a href="#" class="block px-2 hover:bg-gray-200" @click="select()" wire:click.prevent="changePaginate({{$s}})">{{$s}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="relative w-1/3 z-30">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" class="block w-full px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari..." wire:model.live="search" />
            </div>
        </div>
        @if($records->total() == 0)
            <div class="flex justify-center">
                <img src="{{asset('assets/undraw_no_data.svg')}}" class="w-60" alt="">
            </div>
        @else
            <div class="overflow-x-auto">
                <table id="product-list-data-table" class="table-default table-hover data-table mt-4">
                    <thead>
                    <tr>
                        <th>Nama Lengkap </th>
                        <th>Nomor</th>
                        <th>Tahun</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Wilayah</th>
                        <th>Lapangan</th>
                        <th>Status Kontrak</th>
                        @can('edit')
                            @if($menu != 'tempat_sampah')
                                <th>Publik</th>
                            @endif
                        @endcan
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        <span class="avatar avatar-rounded avatar-md">
                                            <img class="avatar-img avatar-rounded"
                                                 src="{{ isset($record->gambar) && !empty($record->gambar) && Storage::exists('public/'.$record->gambar) ? asset('storage/'.$record->gambar) : asset('assets/img/avatars/man.png') }}" loading="lazy">
                                        </span>
                                        <span class="ml-2 rtl:mr-2 font-semibold">
                                            {{'Jhon'}} {{$record->nama_tengah}} {{$record->nama_belakang}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span class="capitalize">{{'1234'}}</span>
                                </td>
                                <td>{{'2024'}}</td>
                                <td>{{'12-12-2022'}}</td>
                                <td>{{'12-12-2024'}}</td>
                                <td>{{'Abepura'}}</td>
                                <td>{{'Lapangan 1'}}</td>
                                <td>{{'Aktif'}}</td>
                                @can('edit')
                                    @if(!isset($record->deleted_at))
                                        <td>
                                            <div class="relative">
                                                <label class="inline-flex items-center cursor-pointer" wire:key="toggle-{{$record->id}}">
                                                    <input type="checkbox" value="" class="sr-only peer" @checked(isset($record->published_at)) wire:change.prevent="publishOrDraft({{$record->id}})">
                                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endcan
                                <td>
                                    <div class="flex justify-end items-center text-lg">
                                        @if(isset($record->deleted_at))
                                            @can('edit')
                                                <span class="cursor-pointer p-2 hover:text-indigo-600" wire:click.prevent="undo({{$record->id}})" id="undo{{$record->id}}">
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                </span>
                                                <script>
                                                    tippy('#undo'+@js($record->id), {
                                                        content: 'Restore',
                                                        theme: 'primary'
                                                    });
                                                </script>
                                            @endcan
                                        @else
                                            @can('view')
                                                <span class="cursor-pointer p-2 hover:text-indigo-600" wire:click.prevent="$dispatch('detail', { id: {{ $record->id }} })" id="detail{{$record->id}}">
                                                    <i class="fa-solid fa-eye text-sm"></i>
                                                </span>
                                                <script>
                                                    tippy('#detail'+@js($record->id), {
                                                        content: 'Detail',
                                                        theme: 'primary'
                                                    });
                                                </script>
                                            @endcan
                                            @can('edit')
                                                <span class="cursor-pointer p-2 hover:text-indigo-600" wire:click.prevent="$dispatch('ubah', { id: {{ $record->id }} })" id="ubah{{$record->id}}">
                                                    <i class="fa-solid fa-edit text-sm"></i>
                                                </span>
                                                <script>
                                                    tippy('#ubah'+@js($record->id), {
                                                        content: 'Ubah',
                                                        theme: 'primary'
                                                    });
                                                </script>
                                            @endcan
                                        @endif
                                        @can('delete')
                                            <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true" wire:click.prevent="modal({{$record->id}})" id="delete{{$record->id}}">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </span>
                                            <script>
                                                tippy('#delete'+@js($record->id), {
                                                    content: 'Hapus',
                                                    theme: 'primary'
                                                });
                                            </script>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Modal Delete -->
        <x-modal-alpine modalName="openModalDelete" title="Peringatan!">
            <div class="p-4 py-6 text-center">
                <i class="fa-solid fa-info-circle text-6xl text-rose-400"></i>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-600">Apakah anda yakin ingin menghapus data ini?</h3>
                <div class="my-3 flex gap-2 justify-center items-center">
                    <button @click="openModalDelete=false" wire:click.prevent="delete({{$id}})" data-modal-hide="popup-modal" type="button" class="text-rose-400">
                        Ya, saya yakin
                    </button>

                    <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button" class="btn btn-xs btn-solid">Tidak, batalkan</button>
                </div>
            </div>
        </x-modal-alpine>
    </div>

    <div class="mt-6">
        {{ $records->links('customPagination.custom-pagination') }}
    </div>


    <div class="mt-6">
        {{-- {{ $records->links('customPagination.custom-pagination') }} --}}
    </div>
{{--    <x-pagination/>--}}
</div>

