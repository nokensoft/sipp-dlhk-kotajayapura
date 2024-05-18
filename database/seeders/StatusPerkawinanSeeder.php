<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'status_perkawinan' => 'Sudah Kawin',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'status_perkawinan' => 'Belum Kawin',
                'keterangan' => '',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            StatusPerkawinan::create($collection);
        });
    }
}
