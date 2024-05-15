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

                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="avatar avatar-rounded bg-indigo-100 text-indigo-600 avatar-lg text-3xl"
                                        data-avatar-size="55">
                                        <span class="avatar-icon">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div>
                                        <div class="flex gap-1.5 items-end mb-2">
                                            <h3 class="font-bold leading-none">{{$totalAsn}}</h3>
                                            <p class="font-semibold">ASN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="avatar avatar-rounded bg-cyan-100 text-cyan-600 avatar-lg text-3xl"
                                        data-avatar-size="55">
                                        <span class="avatar-icon">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div>
                                        <div class="flex gap-1.5 items-end mb-2">
                                            <h3 class="font-bold leading-none">{{$totalNonAsn}}</h3>
                                            <p class="font-semibold">Non ASN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="avatar avatar-rounded bg-emerald-100 text-emerald-600 avatar-lg text-3xl"
                                        data-avatar-size="55">
                                        <span class="avatar-icon">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div>
                                        <div class="flex gap-1.5 items-end mb-2">
                                            <h3 class="font-bold leading-none">{{$totalPria}}</h3>
                                            <p class="font-semibold">Laki-Laki</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="avatar avatar-rounded bg-amber-100 text-amber-600 avatar-lg text-3xl"
                                        data-avatar-size="55">
                                        <span class="avatar-icon">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <div>
                                        <div class="flex gap-1.5 items-end mb-2">
                                            <h3 class="font-bold leading-none">{{$totalWanita}}</h3>
                                            <p class="font-semibold">Perempuan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-chart class="w-full" title="Jumlah Petugas Berdasarkan Bidang Kerja" :data="$bidangs"/>
                    </div>
                    <div>
                        <x-chart class="w-full" title="Jumlah Petugas Berdasarkan Lokasi Kerja" :data="$lokasi"/>
                    </div>
                    <div class="flex gap-4">
                        <x-chart class="w-1/3" title="Jumlah Petugas Berdasarkan Status Pegawai" :data="$statusPegawai" height="400" fontSize="12"/>
                        <x-chart class="w-1/3" title="Jumlah Petugas Berdasarkan Suku" :data="$suku" height="400" fontSize="14"/>
                        <x-chart class="w-1/3" title="Jumlah Petugas Berdasarkan Jenis Kelamin" :data="$jenisKelamins" height="400" fontSize="12"/>
                    </div>

                </div>
                <div class="flex flex-col gap-4">
                    <div class="xl:w-[380px]">
                        <div class="card card-layout-frame mb-4">
                            <div class="card-body">
                                <div class="project-calendar" inline-datepicker data-date=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:w-[380px]">

                        <div class="card card-layout-frame">
                            <div class="card-body">
                                <div class="flex items-center justify-between mb-6">
                                    <h4>Pengguna Online</h4>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="table-default table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="flex gap-2 items-center">
                                                    <img class="avatar-img avatar-circle w-10"
                                                        src="{{asset('assets/img/avatars/thumb-3.jpg')}}"
                                                        loading="lazy">
                                                    Samuel Bosawer
                                                </td>
                                                <td>
                                                    <div
                                                        class="tag text-green-600 bg-green-100 rounded border-0">
                                                        Online
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="flex gap-2 items-center">
                                                    <img class="avatar-img avatar-circle w-10"
                                                        src="{{asset('assets/img/avatars/thumb-8.jpg')}}"
                                                        loading="lazy">
                                                    Obi Pranata
                                                </td>
                                                <td>
                                                    <div
                                                        class="tag text-green-600 bg-green-100 rounded border-0">
                                                        Online
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</main>
