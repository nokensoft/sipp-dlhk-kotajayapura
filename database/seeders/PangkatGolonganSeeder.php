<?php

namespace Database\Seeders;

use App\Models\PangkatGolongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PangkatGolongan::create(
            [
                'pangkat_golongan' => 'Golongan Ib',
                'keterangan' => 'Keterangan Golongan Ib',
                'published_at' => now(),
            ]
        );

        PangkatGolongan::create(
            [
                'pangkat_golongan' => 'Golongan Ic',
                'keterangan' => 'Keterangan Golongan Ic ',
                'published_at' => null,
            ]
        );

        PangkatGolongan::create(
            [
                'pangkat_golongan' => 'Golongan Id',
                'keterangan' => 'Keterangan Golongan Id',
                'deleted_at' => now(),
            ]
        );
    }
}
