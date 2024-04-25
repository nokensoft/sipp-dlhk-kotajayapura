
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
                    <div class="border absolute bg-white top-10 left-0 w-16 rounded-lg" x-show="isSelectOpen" @click="isSelectOpen = !isSelectOpen">
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
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-4 border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Pangkat Golongan
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white hover:bg-gray-50 odd:bg-white even:bg-gray-100">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Gol A
                </th>
                <td class="px-6 py-4">
                    Lorem ipsum dolor sit amet.
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="bg-green-700 text-white rounded-lg py-2.5 px-5 hover:bg-green-800">Edit</a>
                    <a href="#" class="bg-red-700 text-white rounded-lg py-2.5 px-5 hover:bg-red-800" @click="openModalDelete = true">Delete</a>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 odd:bg-white even:bg-gray-100">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Gol B
                </th>
                <td class="px-6 py-4">
                    Lorem ipsum dolor sit amet.
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="bg-green-700 text-white rounded-lg py-2.5 px-5 hover:bg-green-800">Edit</a>
                    <a href="#" class="bg-red-700 text-white rounded-lg py-2.5 px-5 hover:bg-red-800" @click="openModalDelete = true">Delete</a>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50 odd:bg-white even:bg-gray-100">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Gol C
                </th>
                <td class="px-6 py-4">
                    Lorem ipsum dolor sit amet.
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="bg-green-700 text-white rounded-lg py-2.5 px-5 hover:bg-green-800">Edit</a>
                    <a href="#" class="bg-red-700 text-white rounded-lg py-2.5 px-5 hover:bg-red-800" @click="openModalDelete = true">Delete</a>
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

