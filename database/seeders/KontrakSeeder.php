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
                'nomor_kontrak' => '123',
                'tahun_kontrak' => 2024,
                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,
                'status_kontrak' => 'Berjalan',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'nomor_kontrak' => '234',
                'tahun_kontrak' => 2023,
                'tanggal_mulai' => now(),
                'tanggal_selesai' => null,
                'status_kontrak' => 'Penggantian',
                'keterangan' => '',
                'published_at' => now(),
            ],
        ])->each(function ($collection) {
            Kontrak::create($collection);
        });
    }
}
