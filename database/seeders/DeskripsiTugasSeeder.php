<?php

namespace Database\Seeders;

use App\Models\DeskripsiTugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeskripsiTugasSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'deskripsi_tugas' => 'Tugas Penyisiran Jalan',
                'published_at' => now(),
            ],
            [
                'deskripsi_tugas' => 'Tugas Bank Sampah',
                'keterangan' => '',
                'published_at' => null,
            ],
            [
                'deskripsi_tugas' => 'Tugas penyapu pasar cigombong',
                'keterangan' => '',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            DeskripsiTugas::create($collection);
        });
    }
}
