<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tugas::create(
            [
                'tugas' => 'Tugas 1',
                'keterangan' => 'keterangan terkait tugas...',
                'published_at' => now(),
            ]
        );

        Tugas::create(
            [
                'tugas' => 'Tugas 2',
                'keterangan' => 'keterangan terkait tugas...',
                'published_at' => null,
            ]
        );

        Tugas::create(
            [
                'tugas' => 'Tugas 3',
                'keterangan' => 'keterangan terkait tugas...',
                'deleted_at' => now(),
            ]
        );

    }
}
