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
                'id' => 1,
                'jenjang_pendidikan' => 'Tanpa keterangan',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'jenjang_pendidikan' => 'SD',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'jenjang_pendidikan' => 'SMP',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 4,
                'jenjang_pendidikan' => 'SMK',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 5,
                'jenjang_pendidikan' => 'SMA',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 6,
                'jenjang_pendidikan' => 'S1',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 7,
                'jenjang_pendidikan' => 'S2',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ],
            [
                'id' => 8,
                'jenjang_pendidikan' => 'S3',
                'keterangan' => 'keterangan terkait jenjang pendidikan...',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            JenjangPendidikan::create($collection);
        });
    }
}
