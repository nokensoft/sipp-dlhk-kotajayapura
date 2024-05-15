<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'agama' => 'Kristen Protestan',
                'keterangan' => 'Agama Kristen Protestan',
                'published_at' => now(),
            ],
            [
                'agama' => 'Islam',
                'keterangan' => 'Agama Islam',
                'published_at' => now(),
            ],
            [
                'agama' => 'Katolik',
                'keterangan' => 'Agama Katolik',
                'published_at' => now(),
            ],
            [
                'agama' => 'Hindu',
                'keterangan' => 'Agama Hindu',
                'published_at' => now(),
            ],
            [
                'agama' => 'Budha',
                'keterangan' => 'Agama Budha',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            Agama::create($collection);
        });
    }
}
