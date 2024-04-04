<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::share('siteTitle', 'SIPP-DLHK');
        View::share('siteDescription', 'Sistem Informasi Pelayanan Persampahan Dinas Lingkungan Hidup dan Kebersihan Kota Jayapura');
    }
}
