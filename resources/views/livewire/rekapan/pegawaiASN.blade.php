<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="flex flex-col xl:flex-row gap-4">
                <div class="flex flex-col gap-4 flex-auto">

                    <h3 class="text-xl font-bold tracking-tight text-gray-900"> Rekapan </h3>
                    <p>Rekap Data Pegawai ASN</p>

                    <div class="xl:flex gap-4">
                        <x-chart class="w-1/2 card card-layout-frame" title="Rekap Pegawai ASN Berdasarkan Suku" :data="$sukus"/>
                        <x-chart class="w-1/2 card card-layout-frame" title="Pegawai ASN Berdasarkan Jenis Kelamin" :data="$jenisKelamins"/>
                    </div>

                    <div class="xl:flex gap-4">
                        <x-chart class="w-1/2 card card-layout-frame" title="Rekap Pegawai ASN Berdasarkan Jenjang Pendidikan" :data="$jenjangPendidikans"/>
                        <x-chart class="w-1/2 card card-layout-frame" title="Pegawai ASN Berdasarkan Status Perkawinan" :data="$statusPerkawinans"/>
                    </div>
                    

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</main>
