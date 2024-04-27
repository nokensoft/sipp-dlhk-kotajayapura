<?php

namespace Database\Seeders;

use App\Models\DeskripsiTugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeskripsiTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeskripsiTugas::create(
            [
                'deskripsi_tugas' => 'Tugas Penyisiran Jalan',
                'keterangan' => ''
            ]
        );

        DeskripsiTugas::create(
            [
                'deskripsi_tugas' => 'Tugas Bank Sampah',
                'keterangan' => ''
            ]
        );

        DeskripsiTugas::create(
            [
                'deskripsi_tugas' => 'Tugas penyapu pasar cigombong',
                'keterangan' => ''
            ]
        );
    }
}
