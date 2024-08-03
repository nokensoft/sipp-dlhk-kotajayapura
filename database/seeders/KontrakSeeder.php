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
                'pegawai_id' => 2000,
                'lapangan_id' => 101, // Lapangan: Penyapuan Jayapura Utara I

                'nomor' => '123',
                'tahun' => 2024,

                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,

                'latitude' => '-2.514329',
                'longitude' => '140.664125',

                'status' => 'Baru',

                'dokumen' => '',

                'keterangan' => '',

                'published_at' => now(),
            ],
            [
                'pegawai_id' => 2001,
                'lapangan_id' => 101, // Lapangan: Penyapuan Jayapura Utara I

                'nomor' => '234',
                'tahun' => 2023,

                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,

                'latitude' => '-2.527705',
                'longitude' => '140.690904',

                'status' => 'Penggantian',

                'dokumen' => '',

                'keterangan' => '',

                'published_at' => now(),
            ],

            [
                'pegawai_id' => 2001,
                'lapangan_id' => 201, // Lapangan: Penyapuan Jayapura Selatan I

                'nomor' => '234',
                'tahun' => 2022,

                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,

                'latitude' => '-2.527705',
                'longitude' => '140.690904',

                'status' => 'Penggantian',

                'dokumen' => '',

                'keterangan' => '',

                'published_at' => now(),
            ],

            [
                'pegawai_id' => 2002,
                'lapangan_id' => 201, // Lapangan: Penyapuan Jayapura Selatan I

                'nomor' => '234',
                'tahun' => 2022,

                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,

                'latitude' => '-2.566141',
                'longitude' => '140.667867',


                'status' => 'Penggantian',

                'dokumen' => '',

                'keterangan' => '',

                'published_at' => now(),
            ],




        ])->each(function ($collection) {
            Kontrak::create($collection);
        });
    }
}
