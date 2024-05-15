<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DataMaster\PangkatGolongan\Index as PangkatGolongan;
use App\Livewire\Admin\DataMaster\Jabatan\Index as Jabatan;
use App\Livewire\Admin\DataMaster\Tugas\Index as Tugas;
use App\Livewire\Admin\DataMaster\GelarDepan\Index as GelarDepan;
use App\Livewire\Admin\DataMaster\GelarBelakang\Index as GelarBelakang;

Route::get('/', function () {
    return view('AdminMaster.login');
});

// ------------------ ADMIN MASTER
// require_once 'AdminMaster/index.php';



use App\Livewire\Dasbor;
use App\Livewire\Profil;
use App\Livewire\Pengaturan;
use App\Livewire\Pegawai\Index as Asn;
use App\Livewire\NonAsn\Index as NonAsn;
use App\Livewire\Bidang\Index as Bidang;
use App\Livewire\Lokasi\Index as Lokasi;
use App\Livewire\Pengguna\Index as Pengguna;

Route::get('/profil', Profil::class)->name('adminmaster.profil');
Route::get('/pengaturan', Pengaturan::class)->name('adminmaster.pengaturan');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dasbor', Dasbor::class)->name('dasbor');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/asn', Asn::class)->name('asn');
    Route::get('/non-asn', Asn::class)->name('nonAsn');
//    Route::get('/non-asn', NonAsn::class)->name('nonAsn');
    Route::get('/bidang', Bidang::class)->name('bidang');
    Route::get('/lokasi', Lokasi::class)->name('lokasi');
    Route::get('/pengguna', Pengguna::class)->name('pengguna');
    Route::prefix('data-master')->group(function () {
        Route::get('pangkat-golongan', PangkatGolongan::class)->name('pangkatGolongan');
        Route::get('jabatan', Jabatan::class)->name('jabatan');
        Route::get('tugas', Tugas::class)->name('tugas');
        Route::get('gelar-depan', GelarDepan::class)->name('gelarDepan');
        Route::get('gelar-belakang', GelarBelakang::class)->name('gelarBelakang');
    });
});
