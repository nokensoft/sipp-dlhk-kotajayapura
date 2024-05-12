<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <form wire:submit.prevent="save">
                <div class="form-container vertical">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div class="lg:col-span-2">
                            <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">
                                    <h5 class="font-semibold text-lg">Informasi Pribadi</h5>
                                    <p class="mb-6">Informasi biodata pegawai</p>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/3">
                                            <x-admin.input label="Nama Depan" id="nama-depan" name="pegawai.nama_depan" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/3">
                                            <x-admin.input label="Nama Tengah" id="nama-tengah" name="pegawai.nama_tengah" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/3">
                                            <x-admin.input label="Nama Belakang" id="nama-belakang" name="pegawai.nama_belakang" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/3">
                                            <x-admin.input label="username" id="username" type="text"  name="user.username" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/3">
                                            <x-admin.input label="email" id="email" type="email"  name="pegawai.email" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/3">
                                            <x-admin.input label="No HP" id="no-hp" type="number" name="pegawai.no_hp" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="KTP" subtitle="Upload KTP" id="ktp" label="KTP" name="pegawai.ktp" :img="isset($pegawai['ktp']) && !empty($pegawai) ? $pegawai['ktp'] : ''" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="Kartu Keluarga" subtitle="Upload Kartu Keluarga" id="kk" label="Kartu Keluarga" name="pegawai.kk" :img="isset($pegawai['kk']) && !empty($pegawai) ? $pegawai['kk'] : ''" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="Transkip Nilai" subtitle="Upload Transkip Nilai" id="transkip-nilai" label="Transkip Nilai" name="pegawai.transkip_nilai"  :img="isset($pegawai['transkip_nilai']) && !empty($pegawai) ? $pegawai['transkip_nilai'] : ''"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="Ijazah" subtitle="Upload Ijazah" id="ijazah" label="Ijazah" name="pegawai.ijazah" :img="isset($pegawai['ijazah']) && !empty($pegawai) ? $pegawai['ijazah'] : ''" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="Akte Kelahiran" subtitle="Upload Akte Kelahiran" id="akte-kelahiran" label="Akte Kelahiran" name="pegawai.akte_kelahiran" :img="isset($pegawai['akte_kelahiran']) && !empty($pegawai) ? $pegawai['akte_kelahiran'] : ''" :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.upload-file title="Akte Pernikahan" subtitle="Upload Akte Pernikahan" id="akte-pernikahan" label="Akte Pernikahan" name="pegawai.akte_pernikahan" :img="isset($pegawai['akte_pernikahan']) && !empty($pegawai) ? $pegawai['akte_pernikahan'] : ''" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">
                                    <h5 class="font-semibold text-lg">Data Master</h5>
                                    <p class="mb-6">Form untuk melengkapi datar administrasi lainnya</p>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Bidang Kerja" id="bidang" optionName="bidang" :options="$bidang" name="pegawai.bidang_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Lokasi Kerja" id="lokasi" optionName="lokasi" :options="$lokasi" name="pegawai.lokasi_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Jenis Kelamin" id="jenis-kelamin" optionName="jenis_kelamin" :options="$jenisKelamin" name="pegawai.jenis_kelamin_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Agama" id="agama" optionName="agama" :options="$agama" name="pegawai.agama_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Pangkat Golongan" id="pangkat-golongan" optionName="pangkat_golongan" :options="$pangkatGolongan" name="pegawai.pangkat_golongan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Suku" id="suku" optionName="suku" :options="$suku" name="pegawai.suku_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Distrik" id="distrik" optionName="distrik" :options="$distrik" name="pegawai.distrik_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Kelurahan" id="kelurahan" optionName="kelurahan" :options="$kelurahan" name="pegawai.kelurahan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Jabatan" id="jabatan" optionName="jabatan" :options="$jabatan" name="pegawai.jabatan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Deskripsi Tugas" id="deskripsi-tugas" optionName="deskripsi_tugas" :options="$deskripsiTugas" name="pegawai.deskripsi_tugas_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Gelar Depan" id="gelar-depan" optionName="gelar_depan" :options="$gelarDepan" name="pegawai.gelar_depan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Gelar Belakang" id="gelar-belakang" optionName="gelar_belakang" :options="$gelarBelakang" name="pegawai.gelar_belakang_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Gelar Akademis" id="gelar-akademis" optionName="gelar_akademis" :options="$gelarAkademis" name="pegawai.gelar_akademis_id"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.select label="Jenjang Pendidikan" id="jenjang-pendidikan" optionName="jenjang_pendidikan" :options="$jenjangPendidikan" name="pegawai.jenjang_pendidikan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <x-admin.select label="Status Perkawinan" id="status-perkawinan" optionName="status_perkawinan" :options="$statusPerkawinan" name="pegawai.status_perkawinan_id"  :isDisabled="$isDisabled" />
                                    </div>
                                    <div class="form-item">
                                        <x-admin.textarea label="{{$isAsn ? 'Catatan' : 'Keterangan'}}" id="catatan" name="pegawai.catatan" :isDisabled="$isDisabled" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-1">
                            <div class="card adaptable-card mb-4">
                                <div class="card-body">
                                    <x-admin.upload-file title="Gambar" subtitle="Upload Gambar" id="gambar" label="Gambar" name="pegawai.gambar" :img="isset($pegawai['gambar']) && !empty($pegawai) ? $pegawai['gambar'] : ''" :isDisabled="$isDisabled" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!$isDisabled)
                        <div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4">
                            <div class="md:flex items-center">
                                <button class="btn btn-default btn-sm ltr:mr-2 rtl:ml-2" type="button">Discard</button>
                                <button class="btn btn-solid btn-sm" type="submit">
                                    <span class="flex items-center justify-center">
                                        <span class="text-lg">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 1024 1024" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M893.3 293.3L730.7 130.7c-7.5-7.5-16.7-13-26.7-16V112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V338.5c0-17-6.7-33.2-18.7-45.2zM384 184h256v104H384V184zm456 656H184V184h136v136c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V205.8l136 136V840zM512 442c-79.5 0-144 64.5-144 144s64.5 144 144 144 144-64.5 144-144-64.5-144-144-144zm0 224c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ltr:ml-1 rtl:mr-1">Save</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</main>
