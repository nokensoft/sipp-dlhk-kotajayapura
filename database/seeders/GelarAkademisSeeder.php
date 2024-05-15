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
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Magister',
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Doktor',
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Profesor',
                'keterangan' => '',
                'published_at' => null,
            ]
        );

        GelarAkademis::create(
            [
                'gelar_akademis' => 'Diplom',
                'keterangan' => '',
                'deleted_at' => now(),
            ]
        );
    }

}
