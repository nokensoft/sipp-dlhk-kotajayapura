<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bidang::create(
            [
                'bidang' => 'Staf Administrasi',
                'keterangan' => ''
            ]
        );
        Bidang::create(
            [
                'bidang' => 'BANK Sampah',
                'keterangan' => ''
            ]
        );
        Bidang::create(
            [
                'bidang' => 'Sopir Truck',
                'keterangan' => ''
            ]
        );
        Bidang::create(
            [
                'bidang' => 'Petugas Pengangkutan Sampah',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Sopir Ambrol 53',
                'keterangan' => ''
            ]
        );
        Bidang::create(
            [
                'bidang' => 'Petugas Pengangkutan Sampah',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Sopir',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Petugas Pembabatan Jalan',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Petugas Mobasah',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Petugas Penyisiran Jalan',
                'keterangan' => ''
            ]
        );

        Bidang::create(
            [
                'bidang' => 'Petugas Penyapuan',
                'keterangan' => ''
            ]
        );
    }
}
