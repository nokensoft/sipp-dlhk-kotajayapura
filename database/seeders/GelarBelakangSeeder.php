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
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SH',
                'keterangan' => 'S1 HUKUM',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SPd',
                'keterangan' => 'S1 PENDIDIKAN',
                'published_at' => now(),
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'SIp',
                'keterangan' => 'S1 ILMU POLITIK',
                'published_at' => now(),
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'SE',
                'keterangan' => 'S1 EKONOMI',
                'published_at' => now(),
            ]
        );


        GelarBelakang::create(
            [
                'gelar_belakang' => 'S.Kom',
                'keterangan' => 'S1 KOMPUTER',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMK',
                'keterangan' => 'SMK',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMA',
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'Paket C',
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SD',
                'keterangan' => '',
                'published_at' => now(),
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'SMP',
                'keterangan' => '',
                'published_at' => null,
            ]
        );

        GelarBelakang::create(
            [
                'gelar_belakang' => 'Madrasah Aliyah',
                'keterangan' => '',
                'deleted_at' => now(),
            ]
        );
    }
}
