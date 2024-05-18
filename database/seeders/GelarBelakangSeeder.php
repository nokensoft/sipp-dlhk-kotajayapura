<?php

namespace Database\Seeders;

use App\Models\GelarBelakang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarBelakangSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'gelar_belakang' => 'S1',
                'keterangan' => 'S1 ',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SH',
                'keterangan' => 'S1 HUKUM',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SPd',
                'keterangan' => 'S1 PENDIDIKAN',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SIp',
                'keterangan' => 'S1 ILMU POLITIK',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SE',
                'keterangan' => 'S1 EKONOMI',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'S.Kom',
                'keterangan' => 'S1 KOMPUTER',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SMK',
                'keterangan' => 'SMK',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SMA',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'Paket C',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SD',
                'keterangan' => '',
                'published_at' => now(),
            ],
            [
                'gelar_belakang' => 'SMP',
                'keterangan' => '',
                'published_at' => null,
            ],
            [
                'gelar_belakang' => 'Madrasah Aliyah',
                'keterangan' => '',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            GelarBelakang::create($collection);
        });
    }
}
