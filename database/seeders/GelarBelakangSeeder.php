<?php

namespace Database\Seeders;

use App\Models\GelarBelakang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarBelakangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GelarBelakang::create(
            [
                'gelar_belakang' => 'S1',
                'keterangan' => 'S1 ',
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SH',
                'keterangan' => 'S1 HUKUM',
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SPd',
                'keterangan' => 'S1 PENDIDIKAN',
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'SIp',
                'keterangan' => 'S1 ILMU POLITIK',
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'SE',
                'keterangan' => 'S1 EKONOMI',
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'S.Kom',
                'keterangan' => 'S1 KOMPUTER',
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMK',
                'keterangan' => 'SMK',
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMA',
                'keterangan' => ''
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'Paket C',
                'keterangan' => ''
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SD',
                'keterangan' => ''
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMP',
                'keterangan' => ''
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'Madrasah Aliyah',
                'keterangan' => ''
            ]
        );
    }
}
