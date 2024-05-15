<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'tugas' => 'Tugas 1',
                'keterangan' => 'keterangan terkait tugas...',
                'published_at' => now(),
            ],
            [
                'tugas' => 'Tugas 2',
                'keterangan' => 'keterangan terkait tugas...',
                'published_at' => null,
            ],
            [
                'tugas' => 'Tugas 3',
                'keterangan' => 'keterangan terkait tugas...',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            Tugas::create($collection);
        });
    }
}
