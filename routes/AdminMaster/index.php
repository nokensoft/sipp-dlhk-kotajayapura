<?php
use Illuminate\Support\Facades\Route;

Route::prefix('adminmaster')->group(function () {

    Route::get('/dasbor', function () {
        return view('AdminMaster.dasbor');
    })->name('adminmaster.dasbor');

    Route::get('/profil', function () {
        return view('AdminMaster.profil');
    })->name('adminmaster.profil');

    Route::get('/profil/pengaturan', function () {
        return view('AdminMaster.pengaturan');
    })->name('adminmaster.pengaturan');

});
