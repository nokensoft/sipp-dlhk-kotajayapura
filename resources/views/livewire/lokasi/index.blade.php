<div>
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
                            @if($menu === 'create' || $menu === 'edit')
                                <div class="ml-auto">
                                    <x-button-custom title="{{$buttonTitle}}" action="action" class="btn btn-xs btn-solid">
                                        <x-slot name="icon">
                                            <i class="{{$buttonIcon}}"></i>
                                        </x-slot>
                                    </x-button-custom>
                                </div>
                            @endif

                            @if($menu === 'view')
                            <div class="ml-auto" x-show="menu === 'view'">
                                <div class="flex gap-2">
                                    <x-button-custom id="edit-button" tooltip="EDIT DATA!" action="edit({{$id}})" class="btn btn-xs btn-solid">
                                        <x-slot name="icon">
                                            <i class="fa-solid fa-edit text-sm"></i>
                                        </x-slot>
                                    </x-button-custom>
                                    <x-button-custom id="delete-button" tooltip="HAPUS DATA!" @click="openModalDelete = true" class="btn btn-xs btn-solid">
                                        <x-slot name="icon">
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </x-slot>
                                    </x-button-custom>
                                </div>
                            </div>
                             @endif

                        </div>
                    </div>
                    <hr class="border-[1px]">
                    @if($menu === 'create' || $menu === 'edit'  || $menu === 'view'  && $id != '')
                        <livewire:lokasi.form :id="$id" :menu="$menu"/>
                    @else
                        <livewire:lokasi.record />
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
