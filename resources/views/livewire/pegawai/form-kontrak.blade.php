<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="gap-4 flex-wrap">
                <h1 class="font-bold text-xl">Informasi Petugas</h1>
                <p class="">Informasi biodata petugas lapangan</p>
            </div>

            <div class="p-3">
                <div class="form-item flex gap-2 ">
                    <div class="w-1/5">
                            <img width="200" src="{{ asset('assets/img/others/upload.png')}}" alt="" class="" >
                    </div>
                    <div class="w-1/5 content-center">
                         <p class="font-bold text-xl text-black"> Nama Lengkap : <span></span></p>
                         <p class="font-bold text-xl text-black"> NIK : <span></span></p>
                    </div>
                </div>
            </div>

        <hr class="border-[1px]">

        <div class="gap-4 flex-wrap mt-6">
            <h1 class="font-bold text-xl">Informasi Kontrak Baru</h1>
            <p class="">Lengkapi Formulir Kontrak Baru</p>
        </div>

            <form wire:submit.prevent="save">
                <div class="form-container vertical">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div class="lg:col-span-2">
                            <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.input label="Nomor Kontrak" id="nomor-kontrak" name="kontrak.kontrak"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Tahun Kontrak" id="tahun_kontrak" optionName="name" name="kontrak.tahun_kontrak"  :isDisabled="$isDisabled">
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                            </x-admin.select>
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.input type="date" label="Tanggal Mulai" id="tanggal-mulai" name="kontrak.tanggal_mulai"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.input type="date" label="Tanggal Selesai" id="tanggal-selesai" name="kontrak.tanggal_selesai"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Wilayah" id="wilayah" optionName="nama_wilayah" :options="$wilayah" name="pegawai.wilayah_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.select label="Lapangan" id="lapangan" optionName="nama_lapangan" :options="$lapangan" name="pegawai.lapangan_id"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>
                                    <div class="form-item flex gap-2">
                                        <div class="w-1/2">
                                            <x-admin.input  label="Latitude" id="latitude " name="kontrak.latitude"  :isDisabled="$isDisabled" />
                                        </div>
                                        <div class="w-1/2">
                                            <x-admin.input  label="Longitude" id="longitude " name="kontrak.longitude"  :isDisabled="$isDisabled" />
                                        </div>
                                    </div>

                                    <div class="gap-4 flex-wrap mt-6">
                                        <h1 class="font-bold text-xl">Dokumen Kontrak</h1>
                                        <p class="">Unggah dokumen kontrak di sini</p>
                                    </div>
                                    <div class="lg:col-span-1">
                                        <div class="card adaptable-card mb-4">
                                            <div class="card-body">
                                                <x-admin.upload-file title="" subtitle="" id="dokumen" label="dokumen" name="kontrak.dokumen" :img="isset($kontrak['dokumen']) && !empty($kontrak) ? $kontrak['dokumen'] : ''" :isDisabled="$isDisabled" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!$isDisabled)
                        <div id="stickyFooter" class="sticky -bottom-1 -mx-8 px-8 flex items-center justify-end py-4">
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
