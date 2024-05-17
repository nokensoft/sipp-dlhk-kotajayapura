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
            ['lokasi' => 'Jayapura Utara', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5333', 'longitude' => '140.7167', 'published_at' => now()],
            ['lokasi' => 'Jayapura Selatan', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5833', 'longitude' => '140.6167', 'deleted_at' => now()],
            
            ['lokasi' => 'Abepura', 'keterangan' => 'keterangan lokasi...', 'latitude' => '-2.5667', 'longitude' => '140.7167'],
            ['lokasi' => 'Heram', 'keterangan' => 'keterangan lokasi...', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Muara Tami', 'keterangan' => 'keterangan lokasi...', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'TPA', 'keterangan' => 'keterangan lokasi...', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
        ]);

        $data->each(function ($item) {
            Lokasi::create($item); 
        });
    }
}

/*

Kayo Batu
Angkasapura
Bayangkara
Gurabesi
Imbi
Mandala
Tanjung Ria
Trikora
Tahima Sorama
Tobati
Numbay
Hamadi
Entrop
Argapura
Ardipura
Enggros
Koya Kosso
Nafri
Abepantai
Asano
Awiyo
Kota Baru
Vim
Wahno
Way
Mhorock
Yobe
Holtekamp
Koya Tengah
Mosso
Skow Mabo
Skouw Sae
Skow Yambe
Koya Barat
Kota Timur
Waena 
Yoka
Hedam
Wena
Yabansai

*/ 




