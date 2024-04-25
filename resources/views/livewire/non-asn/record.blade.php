<div class="mt-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2 border p-2" x-data="{openModalDelete: false}">
        <div class="flex justify-between">
            <div class="flex gap-1 items-center">
                <span>Tampilkan</span>
                <div
                    class="relative text-center"
                    x-data="{
                        isSelectOpen:false,
                        selected: 10,
                        select(val){
                            this.selected = val;
                            this.isSelectOpen = false;
                        }
                    }"
                >
                    <div class="border p-2 w-16 cursor-pointer rounded-lg" :class="isSelectOpen ? 'border-gray-600' : 'border-gray-400'" @click="isSelectOpen = !isSelectOpen">
                        <span class="mr-1" x-text="selected">10</span> <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="border absolute bg-white top-10 left-0 w-16 rounded-lg" x-show="isSelectOpen" @click.away="isSelectOpen = false">
                        <a href="#" class="block px-2 hover:bg-green-800 hover:text-white" @click="select(10)">10</a>
                        <a href="#" class="block px-2 hover:bg-green-800 hover:text-white" @click="select(15)">25</a>
                        <a href="#" class="block px-2 hover:bg-green-800 hover:text-white" @click="select(50)">50</a>
                        <a href="#" class="block px-2 hover:bg-green-800 hover:text-white" @click="select(100)">100</a>
                    </div>
                </div>
                <span>data</span>
            </div>
            <div class="relative w-1/3">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" class="block w-full px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari..." required />
            </div>
        </div>
        <table id="product-list-data-table" class="table-default table-hover data-table mt-4">
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
                        <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true">
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
                        <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true">
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
                        <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true">
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
                        <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true">
                            <i class="fa-solid fa-trash text-sm"></i>
                        </span>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>

        <!-- Modal Delete -->
        <x-modal-alpine modalName="openModalDelete" title="Peringatan!">
            <div class="p-4 text-center">
                <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-700">Apakah anda yakin ingin menghapus data ini?</h3>
                <button @click="openModalDelete=false" wire:click.prevent="delete()" data-modal-hide="popup-modal" type="button" class="bg-cyan-500 text-white px-4 py-2.5 rounded-lg hover:bg-cyan-600">
                    Ya, saya yakin
                </button>
                <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2.5 rounded-lg ml-4">Tidak, batal</button>
            </div>
        </x-modal-alpine>
    </div>

    <x-pagination/>
</div>

