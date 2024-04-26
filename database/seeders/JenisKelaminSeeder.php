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
                'jenis_kelamin' => 'Pria',
                'keterangan' => 'Jenis kelamin pria/laki-laki'
            ]
        );

        JenisKelamin::create(
            [
                'jenis_kelamin' => 'Wanita',
                'keterangan' => 'Jenis kelamin wanita/perempuan'
            ]
        );
    }
}
