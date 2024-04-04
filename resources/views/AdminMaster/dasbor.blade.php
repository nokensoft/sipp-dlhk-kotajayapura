
@extends('AdminMaster.layouts.app')
@section('content')
<div>
    <h4 class="mb-1">Hello, Admin Master!</h4>
    <p>Selamat datang di halaman utama.</p>
</div>
<div class="flex flex-col xl:flex-row gap-4">
    <div class="flex flex-col gap-4 flex-auto">

        <div class="card card-layout-frame">
            <div class="card-body">
                <div class="flex items-center justify-between mb-6">
                    <h4>Pengguna Online</h4>
                    <button class="btn btn-default btn-sm">Semua Pengguna</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="table-default table-hover">
                        <thead>
                            <tr>
                                <th colspan="1">Nama Pengguna</th>
                                <th colspan="1">Keterangan</th>
                                <th colspan="1">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="flex gap-2 items-center">
                                    <img class="avatar-img avatar-circle w-10" src="{{asset('assets/img/avatars/thumb-3.jpg')}}" loading="lazy">
                                    Samuel Bosawer
                                </td>
                                <td>Operator Bidang Persampahan</td>
                                <td>
                                    <div class="tag text-green-600 bg-green-100 dark:text-green-100 dark:bg-green-500/20 rounded border-0">
                                        Online
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="flex gap-2 items-center">
                                    <img class="avatar-img avatar-circle w-10" src="{{asset('assets/img/avatars/thumb-8.jpg')}}" loading="lazy">
                                    Obi Pranata
                                </td>
                                <td>Operator Bidang Persampahan</td>
                                <td>
                                    <div class="tag text-green-600 bg-green-100 dark:text-green-100 dark:bg-green-500/20 rounded border-0">
                                        Online
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
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
@endsection

