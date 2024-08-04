<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenjangPendidikan;

class JenjangPendidikanSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'jenjang_pendidikan' => 'Tidak ada',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'SD',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'SMP',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'SMK',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'SMA',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'S1',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'S2',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'jenjang_pendidikan' => 'S3',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            JenjangPendidikan::create($collection);
        });
    }
}
