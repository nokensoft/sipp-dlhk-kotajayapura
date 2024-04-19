<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <div class="card adaptable-card">
                <div class="card-body">
                    <div class="lg:flex items-center justify-between mb-4">
                        <div>
                            <h3 class="mb-4 lg:mb-0">ASN</h3>
                            <p>Data Pegawai Aparatur Sipil Negara</p>
                        </div>
                        <div>
                            <x-button-tambah />
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="product-list-data-table" class="table-default table-hover data-table">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>NIK (KTP)</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal lahir</th>
                                    <th>Umur</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-rounded avatar-md">
                                                <img class="avatar-img avatar-rounded"
                                                    src="{{ asset('assets/img/avatars/man.png') }}" loading="lazy">
                                            </span>
                                            <span class="ml-2 rtl:mr-2 font-semibold">Abdul Jabbaar</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="capitalize">9171010501830002</span>
                                    </td>
                                    <td>Laki-Laki</td>
                                    <td>
                                        Jayapura, 5 Januari 1983
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        <div class="flex justify-end items-center text-lg ">
                                            <span class="cursor-pointer p-2 hover:text-indigo-600">
                                                <i class="fa-solid fa-edit text-sm"></i>
                                            </span>
                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-rounded avatar-md">
                                                <img class="avatar-img avatar-rounded"
                                                    src="{{ asset('assets/img/avatars/girl.png') }}" loading="lazy">
                                            </span>
                                            <span class="ml-2 rtl:mr-2 font-semibold">Natalia Kristy Merauje</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="capitalize">9171036512890004</span>
                                    </td>
                                    <td>Perempuan</td>
                                    <td>
                                        Jayapura, 25 Desember 1989
                                    </td>
                                    <td>
                                        34
                                    </td>
                                    <td>
                                        <div class="flex justify-end items-center text-lg ">
                                            <span class="cursor-pointer p-2 hover:text-indigo-600">
                                                <i class="fa-solid fa-edit text-sm"></i>
                                            </span>
                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-rounded avatar-md">
                                                <img class="avatar-img avatar-rounded"
                                                    src="{{ asset('assets/img/avatars/man-2.png') }}" loading="lazy">
                                            </span>
                                            <span class="ml-2 rtl:mr-2 font-semibold">Andi Akbar</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="capitalize">7310090404910003</span>
                                    </td>
                                    <td>Laki-Laki</td>
                                    <td>
                                        Segiri, 4 April 1991
                                    </td>
                                    <td>
                                        32
                                    </td>
                                    <td>
                                        <div class="flex justify-end items-center text-lg ">
                                            <span class="cursor-pointer p-2 hover:text-indigo-600">
                                                <i class="fa-solid fa-edit text-sm"></i>
                                            </span>
                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="avatar avatar-rounded avatar-md">
                                                <img class="avatar-img avatar-rounded"
                                                    src="{{ asset('assets/img/avatars/girl-2.png') }}" loading="lazy">
                                            </span>
                                            <span class="ml-2 rtl:mr-2 font-semibold">Johanna Syane Kailola</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="capitalize">8171034103830001</span>
                                    </td>
                                    <td>Perempuan</td>
                                    <td>
                                        Ternate, 1 Maret 1983
                                    </td>
                                    <td>
                                        40
                                    </td>
                                    <td>
                                        <div class="flex justify-end items-center text-lg ">
                                            <span class="cursor-pointer p-2 hover:text-indigo-600">
                                                <i class="fa-solid fa-edit text-sm"></i>
                                            </span>
                                            <span class="cursor-pointer p-2 hover:text-red-500">
                                                <i class="fa-solid fa-trash text-sm"></i>
                                            </span>
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
</main>

    @push('datatables-scripts')
    <!-- Other Vendors JS -->
    <script src="{{asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables/dataTables.custom-ui.min.js')}}"></script>

    <!-- Page js -->
    <script src="{{asset('assets/js/pages/product-list.js')}}"></script>
    @endpush