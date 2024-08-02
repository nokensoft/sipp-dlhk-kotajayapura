<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            // Jayapura Utara | wilayah_id=1

            // penyapuan
            [
                'id' => 101,
                'nama_lapangan' => 'Penyapuan Jayapura Utara I',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 101, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 102,
                'nama_lapangan' => 'Penyapuan Jayapura Utara II',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 102, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 103,
                'nama_lapangan' => 'Penyapuan Jayapura Utara III',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 103, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 104,
                'nama_lapangan' => 'Penyapuan Jayapura Utara IV',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 104, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan
            [
                'id' => 105,
                'nama_lapangan' => 'Pembabatan Jayapura Utara I',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 105, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 106,
                'nama_lapangan' => 'Pembabatan Jayapura Utara II',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 106, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 107,
                'nama_lapangan' => 'Pembabatan Jayapura Utara III',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 107, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 108,
                'nama_lapangan' => 'Saluran Tebing Jayapura Utara I',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 108, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Jayapura Selatan | wilayah_id=2

            // pembabatan

            // penyapuan

            // saluran tebing
            [
                'nama_lapangan' => 'Jayapura Selatan',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 2, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Abepura | wilayah_id=3

            // pembabatan

            // penyapuan

            // saluran tebing
            [
                'nama_lapangan' => 'Abepura',
                'wilayah_id' => 3, // Abepura | wilayah_id=3
                'pegawai_id' => 3, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Muara Tami | wilayah_id=4

            // pembabatan

            // penyapuan

            // saluran tebing
            [
                'nama_lapangan' => 'Muara Tami',
                'wilayah_id' => 4, // Muara Tami | wilayah_id=4
                'pegawai_id' => 4, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Heram | wilayah_id=5

            // pembabatan

            // penyapuan

            // saluran tebing
            [
                'nama_lapangan' => 'Heram',
                'wilayah_id' => 5, // Heram | wilayah_id=5
                'pegawai_id' => 5, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

        ])->each(function ($collection) {
            Lapangan::create($collection);
        });
    }
}
