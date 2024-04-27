<?php

namespace Database\Seeders;

use App\Models\GelarAkademis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarAkademisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GelarAkademis::create(
            [
                'gelar_akademis' => 'Sarjana',
                'keterangan' => ''
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Magister',
                'keterangan' => ''
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Doktor',
                'keterangan' => ''
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Profesor',
                'keterangan' => ''
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Diplom',
                'keterangan' => ''
            ]
        );
    }

}
