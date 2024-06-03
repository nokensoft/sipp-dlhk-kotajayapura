<main class="h-full">
    <div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
        <div class="container mx-auto">
            <form wire:submit.prevent="save">
                <div class="form-container vertical">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div class="lg:col-span-2">
                            <div class="card adaptable-card !border-b pb-6 py-4 rounded-br-none rounded-bl-none">
                                <div class="card-body">
                                    <h5 class="font-semibold text-lg">Laporan</h5>
                                    <p class="mb-6">Informasi laporan</p>
                                    <div class="form-item">
                                        <x-admin.input label="Judul Laporan" id="laporan" name="laporan.laporan" :isDisabled="$isDisabled" />
                                    </div>

                                    <div class="form-item">
                                        <x-admin.input label="Tanggal" id="tanggal" name="laporan.tanggal" type="date" :isDisabled="$isDisabled"/>
                                    </div>

                                    <div class="form-item">
                                        <x-admin.textarea label="Catatan" id="keterangan" name="laporan.catatan" :isDisabled="$isDisabled" />
                                    </div>


                                    <h3 class="mb-2 text-sm font-medium text-gray-900">Ditujukan Kepada</h3>
                                    <ul class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg">
                                        @foreach($listOption as $list)
                                            @if(auth()->user()->hasRole($segment) != auth()->user()->hasRole($list))
                                                <li class="w-full">
                                                    <div class="flex items-center">
                                                        <input id="{{$list}}" type="checkbox" value="{{$list}}" wire:model="laporanDetail" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" @disabled($isDisabled)>
                                                        <label for="{{$list}}" class="w-full py-1 ms-2 text-sm font-medium text-gray-900">{{$list}}</label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-1">
                            <div class="card adaptable-card mb-4">
                                <div class="card-body">
                                    <x-admin.upload-file title="File" subtitle="Unggah file laporan" id="gambar" label="Gambar" name="laporan.file" :img="isset($laporan['file']) && !empty($laporan) ? $laporan['file'] : ''" :isDisabled="$isDisabled" />
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
