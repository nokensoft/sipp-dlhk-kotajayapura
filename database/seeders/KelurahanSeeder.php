<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelurahan::create(
            [
                'Kelurahan' => 'Vim',
                'keterangan' => 'Distrik Abepura Kelurahan Vim ',
                'distrik_id' => 1,
            ]
        );

        Kelurahan::create(
            [
                'Kelurahan' => 'Wahno',
                'keterangan' => 'Distrik Abepura Kelurahan Wahno ',
                'distrik_id' => 1,
            ]
        );

        Kelurahan::create(
            [
                'Kelurahan' => 'Whai Mrock',
                'keterangan' => 'Distrik Abepura Kelurahan Whai Mrock ',
                'distrik_id' => 1,
            ]
        );


    }
}
