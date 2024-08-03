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

                'latitude' => '',
                'longitude' => '',

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

                'latitude' => '',
                'longitude' => '',

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
