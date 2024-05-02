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
            ['lokasi' => 'Kotaraja', 'keterangan' => 'Keterangan tentang lokasi Kotaraja di Kota Jayapura, Papua', 'latitude' => '-2.5333', 'longitude' => '140.7167', 'published_at' => now()], // Changed 'bidang' to 'lokasi'
            ['lokasi' => 'Abepura', 'keterangan' => 'Keterangan tentang lokasi Abepura di Kota Jayapura, Papua', 'latitude' => '-2.5833', 'longitude' => '140.6167', 'deleted_at' => now()], // Changed 'bidang' to 'lokasi'
            
            ['lokasi' => 'Hamadi', 'keterangan' => 'Keterangan tentang lokasi Hamadi di Kota Jayapura, Papua', 'latitude' => '-2.5667', 'longitude' => '140.7167'], // Changed 'bidang' to 'lokasi'
            ['lokasi' => 'Kayo Batu', 'keterangan' => 'Keterangan tentang lokasi Kayo Batu', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Angkasapura', 'keterangan' => 'Keterangan tentang lokasi Angkasapura', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'Bayangkara', 'keterangan' => 'Keterangan tentang lokasi Bayangkara', 'latitude' => '5.6789', 'longitude' => '8.9012', 'published_at' => now()],
            ['lokasi' => 'Gurabesi', 'keterangan' => 'Keterangan tentang lokasi Gurabesi', 'latitude' => '7.8901', 'longitude' => '9.0123', 'published_at' => now()],
            ['lokasi' => 'Imbi', 'keterangan' => 'Keterangan tentang lokasi Imbi', 'latitude' => '9.0123', 'longitude' => '1.2345', 'published_at' => now()],
            ['lokasi' => 'Mandala', 'keterangan' => 'Keterangan tentang lokasi Mandala', 'latitude' => '2.3456', 'longitude' => '2.3456', 'published_at' => now()],
            ['lokasi' => 'Tanjung Ria', 'keterangan' => 'Keterangan tentang lokasi Tanjung Ria', 'latitude' => '4.5678', 'longitude' => '3.4567', 'published_at' => now()],
            ['lokasi' => 'Trikora', 'keterangan' => 'Keterangan tentang lokasi Trikora', 'latitude' => '6.7890', 'longitude' => '4.5678', 'published_at' => now()],
            ['lokasi' => 'Tahima Sorama', 'keterangan' => 'Keterangan tentang lokasi Tahima Sorama', 'latitude' => '8.9012', 'longitude' => '5.6789', 'published_at' => now()],
            ['lokasi' => 'Tobati', 'keterangan' => 'Keterangan tentang lokasi Tobati', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Numbay', 'keterangan' => 'Keterangan tentang lokasi Numbay', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'Hamadi', 'keterangan' => 'Keterangan tentang lokasi Hamadi', 'latitude' => '5.6789', 'longitude' => '8.9012', 'published_at' => now()],
            ['lokasi' => 'Entrop', 'keterangan' => 'Keterangan tentang lokasi Entrop', 'latitude' => '7.8901', 'longitude' => '9.0123', 'published_at' => now()],
            ['lokasi' => 'Argapura', 'keterangan' => 'Keterangan tentang lokasi Argapura', 'latitude' => '9.0123', 'longitude' => '1.2345', 'published_at' => now()],
            ['lokasi' => 'Ardipura', 'keterangan' => 'Keterangan tentang lokasi Ardipura', 'latitude' => '2.3456', 'longitude' => '2.3456', 'published_at' => now()],
            ['lokasi' => 'Enggros', 'keterangan' => 'Keterangan tentang lokasi Enggros', 'latitude' => '4.5678', 'longitude' => '3.4567', 'published_at' => now()],
            ['lokasi' => 'Koya Kosso', 'keterangan' => 'Keterangan tentang lokasi Koya Kosso', 'latitude' => '6.7890', 'longitude' => '4.5678', 'published_at' => now()],
            ['lokasi' => 'Nafri', 'keterangan' => 'Keterangan tentang lokasi Nafri', 'latitude' => '8.9012', 'longitude' => '5.6789', 'published_at' => now()],
            ['lokasi' => 'Abepantai', 'keterangan' => 'Keterangan tentang lokasi Abepantai', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Asano', 'keterangan' => 'Keterangan tentang lokasi Asano', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'Awiyo', 'keterangan' => 'Keterangan tentang lokasi Awiyo', 'latitude' => '5.6789', 'longitude' => '8.9012', 'published_at' => now()],
            ['lokasi' => 'Kota Baru', 'keterangan' => 'Keterangan tentang lokasi Kota Baru', 'latitude' => '7.8901', 'longitude' => '9.0123', 'published_at' => now()],
            ['lokasi' => 'Vim', 'keterangan' => 'Keterangan tentang lokasi Vim', 'latitude' => '9.0123', 'longitude' => '1.2345', 'published_at' => now()],
            ['lokasi' => 'Wahno', 'keterangan' => 'Keterangan tentang lokasi Wahno', 'latitude' => '2.3456', 'longitude' => '2.3456', 'published_at' => now()],
            ['lokasi' => 'Way', 'keterangan' => 'Keterangan tentang lokasi Way', 'latitude' => '4.5678', 'longitude' => '3.4567', 'published_at' => now()],
            ['lokasi' => 'Mhorock', 'keterangan' => 'Keterangan tentang lokasi Mhorock', 'latitude' => '6.7890', 'longitude' => '4.5678', 'published_at' => now()],
            ['lokasi' => 'Yobe', 'keterangan' => 'Keterangan tentang lokasi Yobe', 'latitude' => '8.9012', 'longitude' => '5.6789', 'published_at' => now()],
            ['lokasi' => 'Holtekamp', 'keterangan' => 'Keterangan tentang lokasi Holtekamp', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Koya Tengah', 'keterangan' => 'Keterangan tentang lokasi Koya Tengah', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'Mosso', 'keterangan' => 'Keterangan tentang lokasi Mosso', 'latitude' => '5.6789', 'longitude' => '8.9012', 'published_at' => now()],
            ['lokasi' => 'Skow Mabo', 'keterangan' => 'Keterangan tentang lokasi Skow Mabo', 'latitude' => '7.8901', 'longitude' => '9.0123', 'published_at' => now()],
            ['lokasi' => 'Skouw Sae', 'keterangan' => 'Keterangan tentang lokasi Skouw Sae', 'latitude' => '9.0123', 'longitude' => '1.2345', 'published_at' => now()],
            ['lokasi' => 'Skow Yambe', 'keterangan' => 'Keterangan tentang lokasi Skow Yambe', 'latitude' => '2.3456', 'longitude' => '2.3456', 'published_at' => now()],
            ['lokasi' => 'Koya Barat', 'keterangan' => 'Keterangan tentang lokasi Koya Barat', 'latitude' => '4.5678', 'longitude' => '3.4567', 'published_at' => now()],
            ['lokasi' => 'Kota Timur', 'keterangan' => 'Keterangan tentang lokasi Kota Timur', 'latitude' => '6.7890', 'longitude' => '4.5678', 'published_at' => now()],
            ['lokasi' => 'Waena', 'keterangan' => 'Keterangan tentang lokasi Waena', 'latitude' => '8.9012', 'longitude' => '5.6789', 'published_at' => now()],
            ['lokasi' => 'Yoka', 'keterangan' => 'Keterangan tentang lokasi Yoka', 'latitude' => '1.2345', 'longitude' => '6.7890', 'published_at' => now()],
            ['lokasi' => 'Hedam', 'keterangan' => 'Keterangan tentang lokasi Hedam', 'latitude' => '3.4567', 'longitude' => '7.8901', 'published_at' => now()],
            ['lokasi' => 'Wena', 'keterangan' => 'Keterangan tentang lokasi Wena', 'latitude' => '5.6789', 'longitude' => '8.9012', 'published_at' => now()],
            ['lokasi' => 'Yabansai', 'keterangan' => 'Keterangan tentang lokasi Yabansai', 'latitude' => '7.8901', 'longitude' => '9.0123', 'published_at' => now()],
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




