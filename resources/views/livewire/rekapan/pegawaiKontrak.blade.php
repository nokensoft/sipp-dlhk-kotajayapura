<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="flex flex-col gap-4">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="flex flex-col xl:flex-row gap-4">
                <div class="flex flex-col gap-4 flex-auto">

                    <h3 class="text-xl font-bold tracking-tight text-gray-900"> Rekapan </h3>
                    <p>Rekap Data Pegawai Kontrak</p>

                    <div>
                        <x-chart class="w-full card card-layout-frame" title="Pegawai Keseluruhan Berdasarkan Suku" :data="$sukus"/>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</main>
