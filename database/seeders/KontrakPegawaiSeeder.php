<?php

namespace Database\Seeders;

use App\Models\KontrakPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KontrakPegawai::create(
            [
                'kontrak_id' => 1,
                'pengawai_id' => 1,
                'tanggal' => '01/03/2024',
            ]
        );

        KontrakPegawai::create(
            [
                'kontrak_id' => 2,
                'pengawai_id' => 1,
                'tanggal' => '01/04/2024',
            ]
        );


    }
}
