

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8" x-data="{openModalDelete: false}">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
        <tr>
            <th scope="col" class="px-6 py-3">
                Pangkat Golongan
            </th>
            <th scope="col" class="px-6 py-3">
                Keterangan
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white hover:bg-gray-50">
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
        <tr class="bg-white hover:bg-gray-50">
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
        <tr class="bg-white hover:bg-gray-50">
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

