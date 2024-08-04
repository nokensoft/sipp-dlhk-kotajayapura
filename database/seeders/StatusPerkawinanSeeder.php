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
                'status_perkawinan' => 'Sudah Nikah',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'status_perkawinan' => 'Belum Nikah',
                'keterangan' => '',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            StatusPerkawinan::create($collection);
        });
    }
}
