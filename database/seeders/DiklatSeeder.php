<?php

namespace Database\Seeders;

use App\Models\Diklat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiklatSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'diklat' => 'Diklat 1',
                'keterangan' => 'keterangan tentang diklat...',
                'published_at' => now(),
            ],
            [
                'diklat' => 'Diklat 2',
                'keterangan' => 'keterangan tentang diklat...',
                'published_at' => null,
            ],
            [
                'diklat' => 'Diklat 3',
                'keterangan' => 'keterangan tentang diklat...',
                'deleted_at' => now(),
            ],
        ])->each(function ($collection) {
            Diklat::create($collection);
        });
    }
}
