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
                'id' => 1,
                'status_perkawinan' => 'Sudah Nikah',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'status_perkawinan' => 'Belum Nikah',
                'keterangan' => '',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            StatusPerkawinan::create($collection);
        });
    }
}
