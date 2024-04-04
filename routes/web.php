<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('AdminMaster.login');
})->name('login');

// ------------------ ADMIN MASTER
require_once 'AdminMaster/index.php';
