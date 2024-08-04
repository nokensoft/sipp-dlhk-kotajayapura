<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div>
                <h4 class="mb-1">Hello, {{Auth::user()->username}}!</h4>
                <p>Selamat datang di halaman utama.</p>
            </div>

            <div class="flex flex-col xl:flex-row gap-4">
                <div class="flex flex-col gap-4 flex-auto">

                    <div>
                        <x-chart class="w-full card card-layout-frame" title="Jumlah Petugas Berdasarkan Bidang Kerja" :data="$bidangs"/>
                    </div>
                    <div>
                        <x-chart class="w-full card card-layout-frame" title="Jumlah Petugas Berdasarkan Lokasi Kerja" :data="$lokasi"/>
                    </div>
                    <div class="flex gap-4">
                        <x-chart class="w-1/3 card card-layout-frame" title="Jumlah Petugas Berdasarkan Status Pegawai" :data="$statusPegawai" height="400" fontSize="12"/>
                        <x-chart class="w-1/3 card card-layout-frame" title="Jumlah Petugas Berdasarkan Suku" :data="$suku" height="400" fontSize="14"/>
                        <x-chart class="w-1/3 card card-layout-frame" title="Jumlah Petugas Berdasarkan Jenis Kelamin" :data="$jenisKelamins" height="400" fontSize="12"/>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</main>
