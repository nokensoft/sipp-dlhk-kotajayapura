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
                'keterangan' => 'Golongan Ib: juru muda tingkat I'
            ]
        );

        PangkatGolongan::create(
            [
                'pangkat_golongan' => 'Golongan Ic',
                'keterangan' => 'Golongan Ic: juru'
            ]
        );

        PangkatGolongan::create(
            [
                'pangkat_golongan' => 'Golongan Id',
                'keterangan' => 'Golongan Ic: juru tingkat I'
            ]
        );
    }
}
