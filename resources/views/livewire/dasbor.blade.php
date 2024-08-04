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
                        <div class="rounded-lg bg-white p-8 w-full card card-layout-frame">
                            
                            <div class="form-item flex gap-4">
                                <div class="w-1/4">
                                    <x-admin.select label="Wilayah" id="wilayah-id" optionName="name" name="wilayah">
                                        <option>Semua</option>
                                        @foreach($wilayahs as $wilayah)
                                            <option value="{{$wilayah['nama_wilayah']}}">{{$wilayah->nama_wilayah}}</option>
                                        @endforeach
                                    </x-admin.select>
                                </div>
                                <div class="w-1/4">
                                    <x-admin.select label="Lapangan" id="lapangan-id" optionName="name" name="lapangan">
                                        <option>Semua</option>
                                        @foreach($lapangans as $lapangan)
                                            <option value="{{$lapangan['nama_lapangan']}}">{{$lapangan->nama_lapangan}}</option>
                                        @endforeach
                                    </x-admin.select>
                                </div>

                                <div class="w-1/4">
                                    <x-admin.select label="Tahun Kontrak" id="tahun_kontrak" optionName="name" name="tahun_kontrak">
                                        @foreach($tahuns as $tahun)
                                            <option value="{{$tahun}}">{{$tahun}}</option>
                                        @endforeach
                                    </x-admin.select>
                                </div>

                            </div>

                            

                            <livewire:map/>

                        </div>
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
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
    </div>
</main>
