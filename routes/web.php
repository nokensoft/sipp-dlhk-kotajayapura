<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DataMaster\PangkatGolongan\Index as PangkatGolongan;

Route::get('/', function () {
    return view('AdminMaster.login');
});

// ------------------ ADMIN MASTER
// require_once 'AdminMaster/index.php';



use App\Livewire\Dasbor;
use App\Livewire\Profil;
use App\Livewire\Pengaturan;
use App\Livewire\Asn\Index as Asn;

Route::get('/profil', Profil::class)->name('adminmaster.profil');
Route::get('/pengaturan', Pengaturan::class)->name('adminmaster.pengaturan');

Route::get('/asn', Asn::class)->name('asn');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dasbor', Dasbor::class)->name('dasbor');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('data-master')->group(function () {
        Route::get('pangkat-golongan', PangkatGolongan::class)->name('pangkatGolongan');
    });
});
