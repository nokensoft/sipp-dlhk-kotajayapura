<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\LaporanDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{

    public function run(): void
    {
        $kepada = ['kepaladinas', 'kepaladinas', 'kepalabidang', 'kepalabidang', 'kepalaseksi', 'kepalaseksi'];
        collect([
            [
                'Laporan' => 'laporan 1 kepala dinas',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => null,
                'user_id' => 1,
            ],
            [
                'Laporan' => 'laporan 1 kepala dinas',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
                'user_id' => 1,
            ],
            [
                'Laporan' => 'laporan 2 kepala bidang',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => now(),
                'user_id' => 1,
            ],
            [
                'Laporan' => 'laporan 1 kepala bidang',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
                'user_id' => 1,
            ],
            [
                'Laporan' => 'laporan 3 kepala seksi',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'published_at' => now(),
                'user_id' => 1,
            ],
            [
                'Laporan' => 'laporan 1 kepala seksi',
                'catatan' => 'keterangan singkat',
                'file' => 'laporan.pdf',
                'tanggal' => now(),
                'deleted_at' => now(),
                'user_id' => 1,
            ]
        ])->each(function ($item, $i) use ($kepada) {
            Laporan::create($item);
            LaporanDetail::create(
                [
                    'laporan_id' => $i+1,
                    'kepada' => $kepada[$i]
                ]
            );
        });
    }
}
