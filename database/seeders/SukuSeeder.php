<?php

namespace Database\Seeders;

use App\Models\Suku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SukuSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'suku' => 'Tobati',
                'keterangan' => 'Suku tobati',
                'published_at' => now(),
            ],
            [
                'suku' => 'Maybrat',
                'keterangan' => 'Suku maybrat',
                'published_at' => now(),
            ],
            [
                'suku' => 'Enggros',
                'keterangan' => 'Suku Enggros',
                'published_at' => now(),
            ],
            [
                'suku' => 'Moi',
                'keterangan' => 'Suku Moi',
                'published_at' => null,
            ],
            [
                'suku' => 'Toraja',
                'keterangan' => 'Suku Toraja',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            Suku::create($collection);
        });
    }
}
