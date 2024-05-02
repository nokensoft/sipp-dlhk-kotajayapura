
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
                    <div class="border absolute bg-white top-10 left-0 w-16 rounded-lg" x-show="isSelectOpen" @click="isSelectOpen = !isSelectOpen" @click.away="isSelectOpen = false">
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
        <table class="table-default table-hover data-table mt-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Bidang Kerja
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
            @foreach($records as $record)
            <tr class="bg-white hover:bg-gray-50 odd:bg-white even:bg-gray-100">
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                    {{$record->bidang}}
                </td>
                <td class="px-6 py-4">
                    {{$record->keterangan}}
                </td>
                <td class="px-6 py-4 text-right">
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
            @endforeach
            </tbody>
        </table>

        <!-- Modal Delete -->
        <x-modal-alpine modalName="openModalDelete" title="Peringatan!">
            <div class="p-4 py-6 text-center">
                <i class="fa-solid fa-info-circle text-6xl text-rose-400"></i>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-600">Apakah anda yakin ingin menghapus data ini?</h3>
                <div class="my-3 flex gap-2 justify-center items-center">
                    <button @click="openModalDelete=false" wire:click.prevent="delete()" data-modal-hide="popup-modal" type="button" class="text-rose-400">
                        Ya, saya yakin
                    </button>
                    
                    <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button" class="btn btn-xs btn-solid">Tidak, batalkan</button>
                </div>
            </div>
        </x-modal-alpine>
    </div>

    <x-pagination/>
</div>

