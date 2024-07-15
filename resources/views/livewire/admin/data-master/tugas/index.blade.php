<div x-data="{openModalDelete: false, menu: @entangle('menu')}" x-cloak>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="bg-white px-2 py-4 rounded-lg shadow-2xl">
                <div class="card-body">
                    <div class="lg:flex items-center justify-between mb-2">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900">{{$title}}</h3>
                            <p>{{$subtitle}}</p>
                        </div>
                        <div class="flex flex-col justify-end gap-2">
                            <p class="italic">Dasbor / <span class="font-bold">{{$title}}</span></p>
                            @if(in_array($menu, ['tambah', 'ubah']))
                                <div class="ml-auto">
                                    <x-button-custom title="{{$buttonTitle}}" action="action" class="btn btn-xs btn-solid">
                                        <x-slot name="icon">
                                            <i class="{{$buttonIcon}}"></i>
                                        </x-slot>
                                    </x-button-custom>
                                </div>
                            @endif
                            <div class="ml-auto" x-show="menu === 'detail'">
                                <div class="flex gap-2">
                                    @can('edit')
                                        <x-button-custom id="edit-button" tooltip="UBAH DATA!" action="ubah({{$id}})" class="btn btn-xs btn-solid">
                                            <x-slot name="icon">
                                                <i class="fa-solid fa-edit text-sm"></i>
                                            </x-slot>
                                        </x-button-custom>
                                    @endcan
                                    @can('delete')
                                        <x-button-custom id="delete-button" tooltip="HAPUS DATA!" @click="openModalDelete = true" class="btn btn-xs btn-solid">
                                            <x-slot name="icon">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </x-slot>
                                        </x-button-custom>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="border-[1px]">
                    @if($menu === 'tambah' || ($menu === 'ubah' && $id != '') || ($menu === 'detail' && $id != ''))
                        <livewire:admin.data-master.tugas.form :id="$id" :menu="$menu" :isDisabled="$isDisabled"/>
                    @else
                        <livewire:admin.data-master.tugas.record />
                    @endif

                </div>
            </div>
        </div>
    </div>

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
