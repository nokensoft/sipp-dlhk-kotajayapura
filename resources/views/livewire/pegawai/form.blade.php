<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <form wire:submit.prevent="save">
                <div class="form-container vertical">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div class="lg:col-span-2">
                            <div class="card adaptable-card pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">

                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">

                                        <h5 class="font-semibold text-lg">Status Pegawai</h5>
                                        <p class="mb-6">Informasi status pegawai</p>

                                        <div class="form-item flex gap-2 items-center">
                                            <div class="w-1/3">
                                                <x-admin.select label="Status Pegawai" id="status_pegawai" optionName="name" name="status_pegawai"  :isDisabled="$isDisabled">
                                                    <option>Pilih Status</option>
                                                    <option value="ASN">ASN</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                    <option value="Honorer">Honorer</option>
                                                </x-admin.select>
                                                @error('status_pegawai') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>
                                            
                                            {{-- show this if ASN or Kontrak --}}
                                            <div class="w-1/3">
                                                <input checked id="Non ASN" type="checkbox" value="0" name="isAsn" wire:model="pegawai.is_asn" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                <label for="Non ASN" class="ms-2 text-sm font-medium text-gray-900">Petugas Lapangan</label>
                                            </div>
                                            {{-- end show this if ASN or Kontrak --}}

                                        </div>

                                    </div>

                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
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
                                                <x-admin.select label="Jenis Kelamin" id="jenis-kelamin" optionName="jenis_kelamin" :options="$jenisKelamin" name="pegawai.jenis_kelamin_id"  :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.select label="Suku" id="suku" optionName="suku" :options="$suku" name="pegawai.suku_id"  :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.select label="Agama" id="agama" optionName="agama" :options="$agama" name="pegawai.agama_id"  :isDisabled="$isDisabled" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-item flex gap-2">
                                            <div class="w-1/3">
                                                <x-admin.select label="Jenjang Pendidikan Terakhir" id="jenjang-pendidikan" optionName="jenjang_pendidikan" :options="$jenjangPendidikan" name="pegawai.jenjang_pendidikan_id"  :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.select label="Status Perkawinan" id="status-perkawinan" optionName="status_perkawinan" :options="$statusPerkawinan" name="pegawai.status_perkawinan_id"  :isDisabled="$isDisabled" />
                                            </div>
                                        </div>

                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">Foto Profil</h5>
                                        <p class="mb-6">Unggah foto profil pegawai</p>
                                        
                                        <div class="form-item flex gap-2 ">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Pilih foto profil" subtitle="Foto profil pegawai ukuran persegi" id="gambar" label="Gambar" name="pegawai.gambar" :img="isset($pegawai['gambar']) && !empty($pegawai) ? $pegawai['gambar'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">Informasi Kontak</h5>
                                        <p class="mb-6">Informasi kontak pegawai</p>
                                        
                                        <div class="form-item flex gap-2">
                                            <div class="w-1/3">
                                                <x-admin.input label="Alamat Email" id="email" type="email"  name="pegawai.email" :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.input label="Nomor HP" id="no-hp" type="number" name="pegawai.no_hp" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>  
                                        <div class="form-item w-1/2">
                                            <x-admin.textarea label="Alamat" id="alamat" name="pegawai.alamat" :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">Informasi Pengguna</h5>
                                        <p class="mb-6">Informasi pengguna bagi pegawai</p>

                                        <div class="form-item flex gap-2">
                                            <div class="w-1/3">
                                                <x-admin.input label="Nama Pengguna (Username)" id="username" type="text"  name="user.username" :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.input label="Kata Sandi (Password)" id="kata_sandi" type="password"  name="pegawai.kata_sandi" :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/3">
                                                <x-admin.input label="Ulangi Kata Sandi (Password)" id="ulangi_kata_sandi" type="password"  name="pegawai.ulangi_kata_sandi" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>   

                                        {{-- hidding this set default role=pegawai --}}
                                        <div class="form-item">
                                            <div class="w-1/3">
                                                <x-admin.select label="Role" id="role-id" optionName="name" name="role"  :isDisabled="$isDisabled">
                                                    <option>Pilih Role</option>
                                                    @foreach($roles as $option)
                                                        <option value="{{$option['name']}}">{{$option->name}}</option>
                                                    @endforeach
                                                </x-admin.select>
                                                @error('role') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        {{-- end hidding this set default role=pegawai --}}                                 
                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">Dokumen Pendukung</h5>
                                        <p class="mb-6">Unggah dokumen-dokumen pendukung lainnya</p>

                                        <div class="form-item flex gap-2">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="KTP" subtitle="Unggah dokumen Kartu Tanda Penduduk (KTP)" id="ktp" label="KTP" name="pegawai.ktp" :img="isset($pegawai['ktp']) && !empty($pegawai) ? $pegawai['ktp'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Kartu Keluarga" subtitle="Unggah dokumen Kartu Keluarga (KK)" id="kk" label="Kartu Keluarga" name="pegawai.kk" :img="isset($pegawai['kk']) && !empty($pegawai) ? $pegawai['kk'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>
                                        <div class="form-item flex gap-2">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Transkip Nilai" subtitle="Unggah dokumen Transkip Nilai" id="transkip-nilai" label="Transkip Nilai" name="pegawai.transkip_nilai"  :img="isset($pegawai['transkip_nilai']) && !empty($pegawai) ? $pegawai['transkip_nilai'] : ''"  :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Ijazah" subtitle="Ungah dokumen Ijazah" id="ijazah" label="Ijazah" name="pegawai.ijazah" :img="isset($pegawai['ijazah']) && !empty($pegawai) ? $pegawai['ijazah'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>
                                        <div class="form-item flex gap-2">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Akte Kelahiran" subtitle="Unggah dokumen Akte Kelahiran" id="akte-kelahiran" label="Akte Kelahiran" name="pegawai.akte_kelahiran" :img="isset($pegawai['akte_kelahiran']) && !empty($pegawai) ? $pegawai['akte_kelahiran'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Akte Pernikahan" subtitle="Unggah dokumen Akte Pernikahan" id="akte-pernikahan" label="Akte Pernikahan" name="pegawai.akte_pernikahan" :img="isset($pegawai['akte_pernikahan']) && !empty($pegawai) ? $pegawai['akte_pernikahan'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>                                    
                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">SK Berkala Terakhir</h5>
                                        
                                        <p class="mb-6">Surat Berkala Terakhir bagi PNS</p>

                                        <div class="form-item flex gap-2 items-center">
                                            <div class="w-1/3">
                                                <x-admin.select label="Tahun SK" id="pns_tahun_sk" optionName="name" name="pns_tahun_sk"  :isDisabled="$isDisabled">
                                                    <option>Pilih Tahun</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </x-admin.select>
                                                @error('pns_tahun_sk') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="w-1/3">
                                                <x-admin.select label="Bulan SK" id="pns_bulan_sk" optionName="name" name="pns_bulan_sk"  :isDisabled="$isDisabled">
                                                    <option>Pilih Bulan</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </x-admin.select>
                                                @error('pns_bulan_sk') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="form-item flex gap-2">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Dokumen SK Berkala Terakhir" subtitle="Unggah dokumen SK berkala terakhir" id="pns_sk_berkala_terakhir" label="SK Berkala Terakhir" name="pegawai.pns_sk_berkala_terakhir" :img="isset($pegawai['pns_sk_berkala_terakhir']) && !empty($pegawai) ? $pegawai['pns_sk_berkala_terakhir'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>

                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <h5 class="font-semibold text-lg">SK Pangkat Terakhir</h5>
                                        
                                        <p class="mb-6">Surat Pangkat Terakhir bagi PNS</p>

                                        <div class="form-item flex gap-2 items-center">
                                            <div class="w-1/3">
                                                <x-admin.select label="Tahun SK" id="pns_tahun_sk" optionName="name" name="pns_tahun_sk"  :isDisabled="$isDisabled">
                                                    <option>Pilih Tahun</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </x-admin.select>
                                                @error('pns_tahun_sk') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="w-1/3">
                                                <x-admin.select label="Bulan SK" id="pns_bulan_sk" optionName="name" name="pns_bulan_sk"  :isDisabled="$isDisabled">
                                                    <option>Pilih Bulan</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </x-admin.select>
                                                @error('pns_bulan_sk') <span class="text-red-400">{{ $message }}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="form-item flex gap-2">
                                            <div class="w-1/2">
                                                <x-admin.upload-file title="Dokumen SK Pangkat Terakhir" subtitle="Unggah dokumen SK pangkat terakhir" id="pns_sk_pangkat_terakhir" label="SK pangkat Terakhir" name="pegawai.pns_sk_pangkat_terakhir" :img="isset($pegawai['pns_sk_pangkat_terakhir']) && !empty($pegawai) ? $pegawai['pns_sk_pangkat_terakhir'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>

                                    </div>
                                    
                                    {{-- new section ----------------------------------------}}
                                    <div class="!border-b my-6">
                                        <div class="form-item">
                                            <x-admin.textarea label="Keterangan" id="catatan" name="pegawai.catatan" :isDisabled="$isDisabled" />
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    @if(!$isDisabled)
                        <div id="stickyFooter" class="sticky-bottom-1 -mx-8 px-8 flex items-center justify-end py-4">
                            <div class="md:flex items-center">
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
                                        <span class="ltr:ml-1 rtl:mr-1">Simpan</span>
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
