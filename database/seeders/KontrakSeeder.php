<?php

namespace Database\Seeders;

use App\Models\Kontrak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'kontrak' => 'Kontrak bulan Maret 2024',
                'keterangan' => 'keterangan terkait kontrak...',
                'published_at' => now(),
            ],
            [
                'kontrak' => 'Kontrak bulan April 2024',
                'keterangan' => 'keterangan terkait kontrak...',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            Kontrak::create($collection);
        });
    }
}
