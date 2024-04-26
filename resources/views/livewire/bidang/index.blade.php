<div>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="bg-white px-2 py-4 rounded-lg shadow-2xl max-w-5xl">
                <div class="card-body">
                    <div class="lg:flex items-center justify-between mb-2">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900">Bidang</h3>
                            <p>{{$subtitle}}</p>
                        </div>
                        <div class="flex flex-col justify-end gap-2">
                            <p class="italic">Dasbor / <span class="font-bold">Bidang</span></p>
                            @if($page === 'create')
                                <div class="ml-auto">
                                    <x-button-custom title="{{$buttonTitle}}" action="action" class="btn btn-xs btn-solid">
                                        <x-slot name="icon">
                                            <i class="{{$buttonIcon}}"></i>
                                        </x-slot>
                                    </x-button-custom>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="border-[1px]">
                    @if($page === 'create')
                        <livewire:bidang.form />
                    @else
                        <div class="flex gap-4 mt-8">
                            <a href="#" class="btn btn-xs btn-solid" wire:click.prevent="action"><i class="{{$buttonIcon}}"></i> Tambah</a>
                            <a href="#" class="text-gray-500 hover:border-b-2 hover:border-gray-500 pb-2 hover:pb-0 transition duration:200">Semua (10)</a>
                            <a href="#" class="text-gray-500 hover:border-b-2 hover:border-gray-500 pb-2 hover:pb-0 transition duration:200">Publik (10)</a>
                            <a href="#" class="text-gray-500 hover:border-b-2 hover:border-gray-500 pb-2 hover:pb-0 transition duration:200">Konsep (10)</a>
                            <a href="#" class="text-gray-500 hover:border-b-2 hover:border-gray-500 pb-2 hover:pb-0 transition duration:200">Tempat Sampah (10)</a>
                        </div>
                        <livewire:bidang.record />
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
