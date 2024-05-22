<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = collect([
            // Jayapura Utara
            // ['lokasi' => 'Jayapura Utara 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5185', 'longitude' => '140.6762', 'published_at' => now()],
            ['lokasi' => 'Jayapura Utara 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'published_at' => now()],
            ['lokasi' => 'Jayapura Utara 3', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'published_at' => now()],
            
            // Jayapura Sekatan
            ['lokasi' => 'Jayapura Selatan 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'deleted_at' => now()],
            ['lokasi' => 'Jayapura Selatan 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'deleted_at' => now()],
            
            // Abepura
            ['lokasi' => 'Abepura 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => ''],
            ['lokasi' => 'Abepura 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => ''],
            ['lokasi' => 'Abepura 3', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => ''],
            
            // Heram
            ['lokasi' => 'Heram', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'published_at' => now()],
            
            // Lainnya
            ['lokasi' => 'Muara Tami', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'published_at' => now()],
            
            ['lokasi' => 'TPA', 'keterangan' => 'keterangan lokasi...', 'latitude' => '', 'longitude' => '', 'published_at' => now()],
        ]);

        $data->each(function ($item) {
            Lokasi::create($item);
        });
    }
}
