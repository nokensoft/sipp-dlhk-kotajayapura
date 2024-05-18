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
                'id' => 1,
                'suku' => 'OAP',
                'keterangan' => 'Orang Asli Papua',
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'suku' => 'Non OAP',
                'keterangan' => 'Non Orang Asli Papua',
                'published_at' => now(),
            ],
        ])->each(function ($collection) {
            Suku::create($collection);
        });
    }
}
