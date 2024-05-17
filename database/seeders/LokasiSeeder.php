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
            ['lokasi' => 'Jayapura Utara 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5333', 'longitude' => '140.7167', 'published_at' => now()],
            ['lokasi' => 'Jayapura Utara 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5333', 'longitude' => '140.7167', 'published_at' => now()],
            ['lokasi' => 'Jayapura Utara 3', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5333', 'longitude' => '140.7167', 'published_at' => now()],
            
            // Jayapura Sekatan
            ['lokasi' => 'Jayapura Selatan 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5833', 'longitude' => '140.6167', 'deleted_at' => now()],
            ['lokasi' => 'Jayapura Selatan 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5833', 'longitude' => '140.6167', 'deleted_at' => now()],
            
            // Abepura
            ['lokasi' => 'Abepura 1', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5667', 'longitude' => '140.7167'],
            ['lokasi' => 'Abepura 2', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5667', 'longitude' => '140.7167'],
            ['lokasi' => 'Abepura 3', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5667', 'longitude' => '140.7167'],
            
            // Heram
            ['lokasi' => 'Heram', 'keterangan' => 'keterangan lokasi...', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            
            // Lainnya
            ['lokasi' => 'Muara Tami', 'keterangan' => 'keterangan lokasi...', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            
            ['lokasi' => 'TPA', 'keterangan' => 'keterangan lokasi...', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
        ]);

        $data->each(function ($item) {
            Lokasi::create($item); 
        });
    }
}



