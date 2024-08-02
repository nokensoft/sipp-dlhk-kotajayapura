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
                'id' => 111,
                'nama_lapangan' => 'Pembabatan Jayapura Utara I',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 111, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 112,
                'nama_lapangan' => 'Pembabatan Jayapura Utara II',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 112, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 121,
                'nama_lapangan' => 'Saluran Tebing Jayapura Utara I',
                'wilayah_id' => 1, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 121, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Jayapura Selatan | wilayah_id=2

            // penyapuan
            [
                'id' => 301,
                'nama_lapangan' => 'Penyapuan Abepura I',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 301, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 302,
                'nama_lapangan' => 'Penyapuan Abepura II',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 302, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 303,
                'nama_lapangan' => 'Penyapuan Abepura III',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 303, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 304,
                'nama_lapangan' => 'Penyapuan Abepura IV',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 304, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan
            [
                'id' => 311,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe I',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 311, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 312,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe II',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 312, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 313,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe III',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 313, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 321,
                'nama_lapangan' => 'Saluran Tebing Abe I',
                'wilayah_id' => 2, // Jayapura Utara | wilayah_id=1
                'pegawai_id' => 321, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Abepura | wilayah_id=3

            // penyapuan

            // pembabatan

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

            // penyapuan

            // pembabatan

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

            // penyapuan

            // pembabatan

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
