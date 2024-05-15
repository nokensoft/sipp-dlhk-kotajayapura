<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisKelamin;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKelamin::create(
            [
                'jenis_kelamin' => 'Laki-Laki',
                'keterangan' => 'Jenis kelamin pria/laki-laki',
                'published_at' => now(),
            ]
        );

        JenisKelamin::create(
            [
                'jenis_kelamin' => 'Perempuan',
                'keterangan' => 'Jenis kelamin wanita/perempuan',
                'published_at' => now(),
            ]
        );
    }
}
