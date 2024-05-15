<?php

namespace Database\Seeders;

use App\Models\SertifikatKeahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SertifikatKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'sertifikat_keahlian' => 'Sertifikat Keahlian 1',
                'keterangan' => 'Keterangan terkait sertifikat keahlian...',
                'published_at' => now(),
            ],
            [
                'sertifikat_keahlian' => 'Sertifikat Keahlian 2',
                'keterangan' => 'Keterangan terkait sertifikat keahlian...',
                'published_at' => null,
            ],
            [
                'sertifikat_keahlian' => 'Sertifikat Keahlian 3',
                'keterangan' => 'Keterangan terkait sertifikat keahlian...',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            SertifikatKeahlian::create($collection);
        });
    }
}
