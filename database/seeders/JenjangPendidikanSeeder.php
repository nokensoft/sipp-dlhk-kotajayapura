<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenjangPendidikan;

class JenjangPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'Tidak ada',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'SD',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'SMP',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'SMK',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'SMA',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'S1',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'S2',
                'keterangan' => '',
            ]
        );

        JenjangPendidikan::create(
            [
                'jenjang_pendidikan' => 'S3',
                'keterangan' => '',
            ]
        );
    }
}
