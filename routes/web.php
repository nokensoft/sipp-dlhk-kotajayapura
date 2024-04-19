<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('AdminMaster.login');
})->name('login');

// ------------------ ADMIN MASTER
// require_once 'AdminMaster/index.php';



use App\Livewire\Dasbor;
use App\Livewire\Profil;
use App\Livewire\Pengaturan;
use App\Livewire\Asn\Index as Asn;
 
Route::get('/dasbor', Dasbor::class)->name('dasbor');
Route::get('/profil', Profil::class)->name('adminmaster.profil');
Route::get('/pengaturan', Pengaturan::class)->name('adminmaster.pengaturan');

Route::get('/asn', Asn::class)->name('asn');