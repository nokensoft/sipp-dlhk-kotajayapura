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
                'id' => 201,
                'nama_lapangan' => 'Penyapuan Jayapura Selatan I',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 201, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 202,
                'nama_lapangan' => 'Penyapuan Jayapura Selatan II',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 202, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 203,
                'nama_lapangan' => 'Penyapuan Jayapura Selatan III',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 203, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 204,
                'nama_lapangan' => 'Penyapuan Jayapura Selatan IV',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 204, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan
            [
                'id' => 211,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Jayapura Selatan I',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 211, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 212,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Jayapura Selatan II',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 212, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 221,
                'nama_lapangan' => 'Saluran Tebing Jayapura Selatan I',
                'wilayah_id' => 2, // Jayapura Selatan | wilayah_id=2
                'pegawai_id' => 221, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            

            /*-----------------------------------------------------------------------------------*/

            // Abepura | wilayah_id=3

            // penyapuan
            [
                'id' => 301,
                'nama_lapangan' => 'Penyapuan Abepura I',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 301, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 302,
                'nama_lapangan' => 'Penyapuan Abepura II',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 302, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 303,
                'nama_lapangan' => 'Penyapuan Abepura III',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 303, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 304,
                'nama_lapangan' => 'Penyapuan Abepura IV',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 304, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan
            [
                'id' => 311,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe I',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 311, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 312,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe II',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 312, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 313,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Abe III',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 313, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 321,
                'nama_lapangan' => 'Saluran Tebing Abe I',
                'wilayah_id' => 3, // Wilayah Abepura | wilayah_id=3
                'pegawai_id' => 321, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Heram | wilayah_id=4

            // penyapuan
            [
                'id' => 401,
                'nama_lapangan' => 'Penyapuan Heram I',
                'wilayah_id' => 4, // Heram | wilayah_id=4
                'pegawai_id' => 401, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 402,
                'nama_lapangan' => 'Penyapuan Heram II',
                'wilayah_id' => 4, // Heram | wilayah_id=4
                'pegawai_id' => 402, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 403,
                'nama_lapangan' => 'Penyapuan Heram III',
                'wilayah_id' => 4, // Heram | wilayah_id=4
                'pegawai_id' => 403, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan
            [
                'id' => 411,
                'nama_lapangan' => 'Pembabatan dan Penyisiran Heram I',
                'wilayah_id' => 4, // Heram | wilayah_id=4
                'pegawai_id' => 411, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // saluran tebing
            [
                'id' => 421,
                'nama_lapangan' => 'Saluran Tebing Heram I',
                'wilayah_id' => 4, // Heram | wilayah_id=4
                'pegawai_id' => 421, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            /*-----------------------------------------------------------------------------------*/

            // Muara Tami | wilayah_id=5

            // penyapuan
            [
                'id' => 501,
                'nama_lapangan' => 'Penyapuan Muara Tami I',
                'wilayah_id' => 5, // Muara Tami | wilayah_id=5
                'pegawai_id' => 501, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

            // pembabatan

            // saluran tebing

            /*-----------------------------------------------------------------------------------*/

            // TPA | wilayah_id=6
            [
                'id' => 601,
                'nama_lapangan' => 'Penyapuan TPA Bomyo',
                'wilayah_id' => 6, // Muara Tami | wilayah_id=TPA
                'pegawai_id' => 601, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 602,
                'nama_lapangan' => 'Penyapuan TPA Koya Koso',
                'wilayah_id' => 6, // Muara Tami | wilayah_id=TPA
                'pegawai_id' => 602, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],
            [
                'id' => 611,
                'nama_lapangan' => 'Pembabatan TPA Koya Koso',
                'wilayah_id' => 6, // Muara Tami | wilayah_id=TPA
                'pegawai_id' => 611, // ID Pegawai PNS yang menjadi koordinator lapangan
                'keterangan' => 'Wilayah kerja petugas lapangan',
                'geojson' => null,
                'published_at' => now(),
            ],

        ])->each(function ($collection) {
            Lapangan::create($collection);
        });
    }
}
