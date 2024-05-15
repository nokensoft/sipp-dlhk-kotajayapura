<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisKelamin;

class JenisKelaminSeeder extends Seeder
{
    public function run(): void
    {        
        collect([
            [
                'jenis_kelamin' => 'Laki-Laki',
                'keterangan' => 'Jenis kelamin pria/laki-laki',
                'published_at' => now(),
            ],
            [
                'jenis_kelamin' => 'Perempuan',
                'keterangan' => 'Jenis kelamin wanita/perempuan',
                'published_at' => now(),
            ]
        ])->each(function ($collection) {
            JenisKelamin::create($collection);
        });
    }
}
