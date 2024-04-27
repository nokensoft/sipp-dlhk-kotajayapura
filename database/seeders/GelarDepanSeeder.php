<?php

namespace Database\Seeders;

use App\Models\GelarDepan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarDepanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GelarDepan::create(
            [
                'gelar_depan' => 'Tidak Ada',
                'keterangan' => ''
            ]
        );

        GelarDepan::create(
            [
                'gelar_depan' => 'Dr.',
                'keterangan' => ''
            ]
        );
        GelarDepan::create(
            [
                'gelar_depan' => 'Drs.',
                'keterangan' => ''
            ]
        );

        GelarDepan::create(
            [
                'gelar_depan' => 'dr.',
                'keterangan' => ''
            ]
        );

        GelarDepan::create(
            [
                'gelar_depan' => 'Prof.',
                'keterangan' => ''
            ]
        );
    }
}
