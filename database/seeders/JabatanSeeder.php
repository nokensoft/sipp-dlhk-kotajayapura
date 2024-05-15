<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'jabatan' => 'Kepala Bidang',
                'keterangan' => 'keterangan terkait jabatan...',
                'published_at' => null,
            ],
            [
                'jabatan' => 'Kepala Bidang',
                'keterangan' => 'keterangan terkait jabatan...',
                'published_at' => null,
            ],
            [
                'jabatan' => 'Kepala Seksi',
                'keterangan' => 'keterangan terkait jabatan...',
                'deleted_at' => now(),
            ],
        ])->each(function ($collection) {
            Jabatan::create($collection);
        });
    }
}
