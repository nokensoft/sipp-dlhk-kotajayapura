<?php

namespace Database\Seeders;

use App\Models\StatusPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'id' => 1,
                'status_pegawai' => 'ASN',
                'keterangan' => 'Pegawai Aparat Sipil Negara (ASN)',
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'status_pegawai' => 'Honorer',
                'keterangan' => 'Pegawai Honorer',
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'status_pegawai' => 'Kontrak',
                'keterangan' => 'Pegawai Kontrak',
                'published_at' => now(),
            ],
        ])->each(function ($collection) {
            StatusPegawai::create($collection);
        });
    }
}
