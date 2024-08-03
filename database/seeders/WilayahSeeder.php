<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'id' => 1,
                'nama_wilayah' => 'Jayapura Utara',
                'pegawai_id' => 1, // ID Pegawai PNS yang menjadi koordinator wilayah
                'keterangan' => 'Wilayah Petugas Persampahan di Distrik Jayapura Utara',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'nama_wilayah' => 'Jayapura Selatan',
                'pegawai_id' => 2, // ID Pegawai PNS yang menjadi koordinator wilayah
                'keterangan' => 'Wilayah Petugas Persampahan di Distrik Jayapura Selatan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'nama_wilayah' => 'Abepura',
                'pegawai_id' => 3, // ID Pegawai PNS yang menjadi koordinator wilayah
                'keterangan' => 'Wilayah Petugas Persampahan di Distrik Abepura',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 4,
                'nama_wilayah' => 'Muara Tami',
                'pegawai_id' => 4, // ID Pegawai PNS yang menjadi koordinator wilayah
                'keterangan' => 'Wilayah Petugas Persampahan di Distrik Muara Tami',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 5,
                'nama_wilayah' => 'Heram',
                'pegawai_id' => 5, // ID Pegawai PNS yang menjadi koordinator wilayah
                'keterangan' => 'Wilayah Petugas Persampahan di Distrik Heram',
                'geojson' => null,
                'published_at' => now(),
            ],
        ])->each(function ($collection) {
            Wilayah::create($collection);
        });
    }
}
