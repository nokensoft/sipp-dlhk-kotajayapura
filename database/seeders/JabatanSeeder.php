<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create(
            [
                'jabatan' => 'Staf Administrasi',
                'keterangan' => ''
            ]
        );
        Jabatan::create(
            [
                'jabatan' => 'BANK Sampah',
                'keterangan' => ''
            ]
        );
        Jabatan::create(
            [
                'jabatan' => 'Sopir Truck',
                'keterangan' => ''
            ]
        );
        Jabatan::create(
            [
                'jabatan' => 'Petugas Pengangkutan Sampah',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Sopir Ambrol 53',
                'keterangan' => ''
            ]
        );
        Jabatan::create(
            [
                'jabatan' => 'Petugas Pengangkutan Sampah',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Sopir',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Petugas Pembabatan Jalan',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Petugas Mobasah',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Petugas Penyisiran Jalan',
                'keterangan' => ''
            ]
        );

        Jabatan::create(
            [
                'jabatan' => 'Petugas Penyapuan',
                'keterangan' => ''
            ]
        );


    }
}
