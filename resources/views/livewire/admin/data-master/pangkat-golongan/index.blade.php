<div>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="bg-white px-2 py-4 rounded-lg shadow-2xl max-w-5xl">
                <div class="card-body">
                    <div class="lg:flex items-center justify-between mb-2">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900">Pangkat Golongan</h3>
                            <p>{{$subtitle}}</p>
                        </div>
                        <div>
                            <x-button-custom title="{{$buttonTitle}}" action="action" class="!p-2 !bg-cyan-600 hover:!bg-cyan-500">
                                <x-slot name="icon">
                                    <i class="{{$buttonIcon}}"></i>
                                </x-slot>
                            </x-button-custom>
                        </div>
                    </div>
                    <hr class="border-[1px]">
                    @if($page === 'create')
                        <livewire:admin.data-master.pangkat-golongan.form />
                    @else
                        <livewire:admin.data-master.pangkat-golongan.record />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
