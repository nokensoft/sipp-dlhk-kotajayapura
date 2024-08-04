<div class="side-nav side-nav-transparent side-nav-expand">
    <div class="side-nav-header">
        <div class="logo px-6">
            <img src="{{asset('assets/img/logo/logo-light-full.png')}}" alt="Logo SIPP DLHK">
        </div>
    </div>
    <div class="side-nav-content relative side-nav-scroll">
        <nav class="menu menu-transparent px-4 pb-4">

            @php
                $segment = request()->segment(1);
                $active = 'bg-[#4F46E5] rounded-lg pl-2';
            @endphp

            <div class="menu-group mt-5">
                <ul>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2 {{$segment == 'dasbor' ? $active : ''}}">
                        <a class="menu-item-link hover:text-black/70 {{$segment == 'dasbor' ? 'text-white' : ''}}" href="{{ route('dasbor') }}">
                            <i class="fa-solid fa-dashboard text-lg"></i>
                            <span class="menu-item-text">Dasbor</span>
                        </a>
                    </li>
                </ul>

                

                <ul>

                    <li class="menu-collapse">
                        <div class="menu-collapse-item">
                            <i class="fa-solid fa-line-chart text-lg"></i>
                            <span class="menu-item-text">Rekapan</span>
                        </div>
                        <ul>

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('rekapanPegawaiKontrak') }}">
                                    <span>Rekap Pegawai Kontrak</span>
                                </a>
                            </li>

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('rekapanPegawaiASN') }}">
                                    <span>Rekap Pegawai ASN</span>
                                </a>
                            </li>

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('rekapanPegawaiHonorer') }}">
                                    <span>Rekap Pegawai Honorer</span>
                                </a>
                            </li>
                            
                            <li data-menu-item="classic-settings" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('rekapanPegawaiKeseluruhan') }}">
                                    <span>Rekap Pegawai Keseluruhan</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>

            </div>
            {{-- menu-group end --}}


            <div class="menu-group">
                <div class="menu-title menu-title-transparent">
                    Pegawai
                </div>
                <ul>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2 {{$segment == 'pegawai' ? $active : ''}}">
                        <a class="menu-item-link hover:text-black/70 {{$segment == 'pegawai' ? 'text-white' : ''}}" href="{{ route('pegawai') }}">
                            <i class="fa-solid fa-users text-lg"></i>
                            <span class="menu-item-text">Pegawai</span>
                        </a>
                    </li>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2 {{$segment == 'kontrak' ? $active : ''}}">
                        <a class="menu-item-link hover:text-black/70 {{$segment == 'kontrak' ? 'text-white' : ''}}" href="{{ route('kontrak') }}">
                            <i class="fa-solid fa-file text-lg"></i>
                            <span class="menu-item-text">Kontrak</span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- menu-group end --}}


            <div class="menu-group">
                <div class="menu-title menu-title-transparent">
                    Pemetaan
                </div>
                <ul>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2 {{$segment == 'wilayah' ? $active : ''}}">
                        <a class="menu-item-link hover:text-black/70 {{$segment == 'wilayah' ? 'text-white' : ''}}" href="{{ route('wilayah') }}">
                            <i class="fa-solid fa-map text-lg"></i>
                            <span class="menu-item-text">Wilayah</span>
                        </a>
                    </li>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2 {{$segment == 'lapangan' ? $active : ''}}">
                        <a class="menu-item-link hover:text-black/70 {{$segment == 'lapangan' ? 'text-white' : ''}}" href="{{ route('lapangan') }}">
                            <i class="fa-solid fa-tags text-lg"></i>
                            <span class="menu-item-text">Lapangan</span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- menu-group end --}}

            @hasanyrole('kepaladinas|kepalabidang|kepalaseksi|adminmaster')

            <div class="menu-group">
                <div class="menu-title menu-title-transparent">
                    Laporan
                </div>

                <ul>
                    <li class="menu-collapse">
                        <div class="menu-collapse-item">
                            <i class="fa-solid fa-box text-lg"></i>
                            <span class="menu-item-text">Laporan</span>
                        </div>
                        <ul>
                            
                            <li data-menu-item="classic-settings" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('laporanKepalaDinas') }}">
                                    <span>Kepala Dinas</span>
                                </a>
                            </li>

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('laporanKepalaBidang') }}">
                                    <span>Kepala Bidang</span>
                                </a>
                            </li>

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('laporanKepalaSeksi') }}">
                                    <span>Kepala Seksi</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>

            </div>
            {{-- menu-group end --}}
            
            @endhasanyrole
            
            
            @hasanyrole('adminmaster')

            {{-- {{ Auth::user()->roles->pluck('name')[0] ?? 'adminmaster' }} --}}

            {{-- <div class="menu-group">
                <div class="menu-title menu-title-transparent">
                    Pengaturan
                </div>

                <ul>
                    <li class="menu-collapse">
                        <div class="menu-collapse-item">
                            <i class="fa-solid fa-box text-lg"></i>
                            <span class="menu-item-text">Data Master</span>
                        </div>
                        <ul>
                            
                           
                            
                            <li data-menu-item="classic-settings" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('pangkatGolongan') }}">
                                    <span>Pangkat/Golongan</span>
                                </a>
                            </li>

                            
                            

                            <li data-menu-item="classic-invoice" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('jabatan') }}">
                                    <span>Jabatan</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-activity-log" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('tugas') }}">
                                    <span>Tugas</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('gelarDepan') }}">
                                    <span>Gelar Depan</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('gelarBelakang') }}">
                                    <span>Gelar Belakang</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('gelarNonAkademis') }}">
                                    <span>Gelar Non Akademis</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('jenjangPendidikan') }}">
                                    <span>Jenjang Pendidikan</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('diklat') }}">
                                    <span>Diklat</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('sertifikatKeahlian') }}">
                                    <span>Sertifikat Keahlian</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('statusPerkawinan') }}">
                                    <span>Status Perkawinan</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('agama') }}">
                                    <span>Agama</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('jenisKelamin') }}">
                                    <span>Jenis Kelamin</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('suku') }}">
                                    <span>Suku</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('distrik') }}">
                                    <span>Distrik</span>
                                </a>
                            </li>
                            <li data-menu-item="classic-kyc-form" class="menu-item">
                                <a class="h-full w-full flex items-center" href="{{ route('kelurahan') }}">
                                    <span>Kelurahan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                        <a class="menu-item-link" href="{{ route('pengguna') }}">
                            <i class="fa-solid fa-users text-lg"></i>
                            <span class="menu-item-text">Pengguna</span>
                        </a>
                    </li>
                    <li data-menu-item="classic-welcome" class="menu-item menu-item-single mb-2">
                        <a class="menu-item-link" href="{{ route('dasbor') }}">
                            <i class="fa-solid fa-gear text-lg"></i>
                            <span class="menu-item-text">Informasi Situs</span>
                        </a>
                    </li>
                </ul>

            </div>
            menu-group end --}}
            
            @endhasanyrole

        </nav>
    </div>
</div>
