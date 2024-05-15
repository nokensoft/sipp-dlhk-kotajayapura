

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


<div class="">
    <div class="border">
        <div id="map" class=""
        style=" width: 100%;
        height: 600px; "></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
    var map = L.map('map').setView([-2.53371, 140.71813], 13); // Koordinat Jayapura dan zoom level 13

// Tambahkan tile layer dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Tambahkan marker untuk menandai kota Jayapura
var marker = L.marker([-2.53371, 140.71813]).addTo(map)
    .bindPopup('<b>Jayapura</b><br>Ibukota Provinsi Papua.')
    .openPopup();

// Tambahkan popup saat peta diklik
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
    </script>



@if (session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  mt-4 " role="alert">
        <span class="font-medium">Berhasil </span> {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        <span class="font-medium">Gagal </span> {{ session()->get('error') }}
    </div>
@endif
<div class="flex gap-4 mb-4  mt-4 items-center">
    <a href="#" class="btn btn-xs btn-solid" wire:click.prevent="$dispatch('action')"><i
            class="fa-solid fa-plus"></i> Tambah</a>
    <a href="#" wire:click.prevent="action('')"
        class="{{ $menu === '' ? 'text-[#4F46E5] font-bold' : 'text-gray-500' }}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Semua
        ({{ $totalAll }})</a>
    <a href="#" wire:click.prevent="action('publik')"
        class="{{ $menu === 'publik' ? 'text-[#4F46E5] font-bold' : 'text-gray-500' }}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Publik
        ({{ $totalPublik }})</a>
    <a href="#" wire:click.prevent="action('konsep')"
        class="{{ $menu === 'konsep' ? 'text-[#4F46E5] font-bold' : 'text-gray-500' }}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Konsep
        ({{ $totalKonsep }})</a>
    <a href="#" wire:click.prevent="action('tempat_sampah')"
        class="{{ $menu === 'tempat_sampah' ? 'text-[#4F46E5] font-bold' : 'text-gray-500' }}  hover:border-b-2 hover:border-[#4F46E5] hover:text-[#4F46E5] pb-2 hover:pb-0 transition duration:200 h-6">Tempat
        Sampah ({{ $totalTempatSampah }})</a>
</div>

<div class="relative shadow-md sm:rounded-lg mt-2 border p-2" x-data="{ openModalDelete: false }" x-cloak>

    <div class="flex justify-between">
        <div class="flex gap-1 items-center">
            <span>Tampilkan</span>
            <div class="relative text-center" x-data="{
                isSelectOpen: false,
                select() {
                    this.isSelectOpen = false;
                }
            }">
                <div class="border p-2 w-16 cursor-pointer rounded-lg"
                    :class="isSelectOpen ? 'border-gray-600' : 'border-gray-400'" @click="isSelectOpen = !isSelectOpen">
                    <span class="mr-1">{{ $paginate }}</span> <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="border absolute bg-white top-10 left-0 w-16 rounded-lg" x-show="isSelectOpen"
                    @click.away="isSelectOpen = false">
                    @foreach ($listPaginate as $list)
                        <a href="#" class="block px-2 hover:bg-green-800 hover:text-white" @click="select()"
                            wire:click.prevent="changePaginate({{ $list }})">{{ $list }}</a>
                    @endforeach
                </div>
            </div>
            <span>data</span>
        </div>
        <div class="relative w-1/3">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search"
                class="block w-full px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cari..." wire:model.live="search" />
        </div>
    </div>
    <div class="overflow-x-auto">
        <table id="product-list-data-table" class="table-default table-hover data-table mt-4">
            <thead>
                <tr>
                    <th>Lokasi</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Keterangan</th>
                    <th>Publik</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->lokasi }}</td>
                        <td>{{ $record->latitude }}</td>
                        <td>{{ $record->longitude }}</td>
                        <td>{{ $record->keterangan }}</td>
                        <td>
                            @php
                                $status = '';
                                if ($record->published_at == null) {
                                    $status = 'konsep';
                                } else {
                                    $status = 'publik';
                                }
                            @endphp
                            <div class="relative">
                                <label class="inline-flex items-center cursor-pointer"
                                    wire:key="toggle-{{ $record->id }}">
                                    <input type="checkbox" value="" class="sr-only peer"
                                        @checked(isset($record->published_at)) wire:change="publishOrDraft({{ $record->id }})">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>
                        </td>
                        <td>
                            @if (isset($record->deleted_at))
                                <span class="cursor-pointer p-2 hover:text-indigo-600"
                                    wire:click.prevent="undo({{ $record->id }})" id="undo{{ $record->id }}">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </span>
                                <script>
                                    tippy('#undo' + @js($record->id), {
                                        content: 'Restore',
                                        theme: 'primary'
                                    });
                                </script>
                                <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true"
                                    wire:click.prevent="modal({{ $record->id }})" id="delete{{ $record->id }}">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </span>
                                <script>
                                    tippy('#delete' + @js($record->id), {
                                        content: 'Hapus',
                                        theme: 'primary'
                                    });
                                </script>
                            @else
                                <div class="flex justify-end items-center text-lg ">
                                    <span class="cursor-pointer p-2 hover:text-indigo-600"
                                        wire:click.prevent="$dispatch('view', { id: {{ $record->id }} })"
                                        id="view{{ $record->id }}">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </span>
                                    <span class="cursor-pointer p-2 hover:text-indigo-600"
                                        wire:click.prevent="$dispatch('edit', { id: {{ $record->id }} })"
                                        id="edit{{ $record->id }}">
                                        <i class="fa-solid fa-edit text-sm"></i>
                                    </span>
                                    <script>
                                        tippy('#view' + @js($record->id), {
                                            content: 'View',
                                            theme: 'primary'
                                        });
                                    </script>
                                    <script>
                                        tippy('#edit' + @js($record->id), {
                                            content: 'Edit',
                                            theme: 'primary'
                                        });
                                    </script>
                                    <span class="cursor-pointer p-2 hover:text-red-500" @click="openModalDelete = true"
                                        wire:click.prevent="modal({{ $record->id }})"
                                        id="delete{{ $record->id }}">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </span>
                                    <script>
                                        tippy('#delete' + @js($record->id), {
                                            content: 'Hapus',
                                            theme: 'primary'
                                        });
                                    </script>
                                </div>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Delete -->
    <x-modal-alpine modalName="openModalDelete" title="Peringatan!">
        <div class="p-4 py-6 text-center">
            <i class="fa-solid fa-info-circle text-6xl text-rose-400"></i>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-600">Apakah anda yakin ingin menghapus data
                ini?</h3>
            <div class="my-3 flex gap-2 justify-center items-center">
                <button @click="openModalDelete=false" wire:click.prevent="delete({{ $id }})"
                    data-modal-hide="popup-modal" type="button" class="text-rose-400">
                    Ya, saya yakin
                </button>

                <button @click="openModalDelete=false" data-modal-hide="popup-modal" type="button"
                    class="btn btn-xs btn-solid">Tidak, batalkan</button>
            </div>
        </div>
    </x-modal-alpine>
</div>

<div class="mt-6">
    {{ $records->links() }}
</div>
{{--    <x-pagination/> --}}
</div>
