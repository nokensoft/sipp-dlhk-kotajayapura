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
                'id' => 1,
                'agama' => 'Kristen Protestan',
                'keterangan' => 'Agama Kristen Protestan',
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'agama' => 'Islam',
                'keterangan' => 'Agama Islam',
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'agama' => 'Katolik',
                'keterangan' => 'Agama Katolik',
                'published_at' => now(),
            ],
            [
                'id' => 4,
                'agama' => 'Hindu',
                'keterangan' => 'Agama Hindu',
                'published_at' => now(),
            ],
            [
                'id' => 5,
                'agama' => 'Budha',
                'keterangan' => 'Agama Budha',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            Agama::create($collection);
        });
    }
}
