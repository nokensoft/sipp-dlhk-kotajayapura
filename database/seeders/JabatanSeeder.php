<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create(
            [
                'jabatan' => 'Kepala Dinas',
                'keterangan' => 'keterangan terkait jabatan...',
                'published_at' => now(),
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Kepala Bidang',
                'keterangan' => 'keterangan terkait jabatan...',
                'published_at' => null,
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Kepala Seksi',
                'keterangan' => 'keterangan terkait jabatan...',
                'deleted_at' => now(),
            ]
        );

    }
}
