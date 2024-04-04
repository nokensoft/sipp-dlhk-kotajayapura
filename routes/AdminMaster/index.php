<?php
use Illuminate\Support\Facades\Route;

Route::prefix('adminmaster')->group(function () {

    Route::get('/dashboard', function () {
        return view('AdminMaster.dashboard');
    })->name('adminmaster.dashboard');

    Route::get('/profile', function () {
        return view('AdminMaster.profile');
    })->name('adminmaster.profil');

    Route::get('/profil/setting', function () {
        return view('AdminMaster.setting');
    })->name('adminmaster.setting');

});
