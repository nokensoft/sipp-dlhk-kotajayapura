<?php

namespace Database\Seeders;

use App\Models\PangkatGolongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatGolonganSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'pangkat_golongan' => 'Golongan Ib',
                'keterangan' => 'Keterangan Golongan Ib',
                'published_at' => now(),
            ],
            [
                'pangkat_golongan' => 'Golongan Ic',
                'keterangan' => 'Keterangan Golongan Ic ',
                'published_at' => null,
            ],
            [
                'pangkat_golongan' => 'Golongan Id',
                'keterangan' => 'Keterangan Golongan Id',
                'deleted_at' => now(),
            ]
        ])->each(function ($collection) {
            PangkatGolongan::create($collection);
        });
    }
}
