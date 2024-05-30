<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    
    public function run(): void
    {
        collect([
            [
                'Laporan' => 'laporan 1 kepala dinas',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepaladinas',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => null,
            ],
            [
                'Laporan' => 'laporan 1 kepala dinas',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepaladinas',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
            ],
            [
                'Laporan' => 'laporan 2 kepala bidang',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepalabidang',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => now(),
            ],
            [
                'Laporan' => 'laporan 1 kepala bidang',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepalabidang',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
            ],
            [
                'Laporan' => 'laporan 3 kepala seksi',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepalaseksi',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => now(),
            ],
            [
                'Laporan' => 'laporan 1 kepala seksi',
                'keterangan' => 'keterangan singkat',
                'kategori' => 'kepalaseksi',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
            ]
        ])->each(function ($item) {
            Laporan::create($item);
        });
    }
}
