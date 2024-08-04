<div x-data="{openModalDelete: false, menu: @entangle('menu')}" x-cloak>
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="bg-white px-2 py-4 rounded-lg shadow-2xl">
                <div class="card-body">

                    <h3 class="text-xl font-bold tracking-tight text-gray-900"> Rekapan </h3>
                    <p>Rekap Data Pegawai Kontrak</p>

                    <livewire:rekapan.pegawaiKontrak />

                </div>
            </div>
        </div>
    </div>
</div>
