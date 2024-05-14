<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'name' => 'adminmaster',
            'keterangan' => 'hak akses sebagai Admin Master'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'operator',
            'keterangan' => 'hak akses sebagai Operator'
        ]);

        Role::create([
            'id' => 3,
            'name' => 'kepaladinas',
            'keterangan' => 'hak akses sebagai Kepala Bidang'
        ]);

        Role::create([
            'id' => 4,
            'name' => 'kepalabidang',
            'keterangan' => 'Hak akses sebagai Kepala Bidang'
        ]);

        Role::create([
            'id' => 5,
            'name' => 'kepalaseksi',
            'keterangan' => 'Hak akses sebagai Kepala Seksi'
        ]);

        Role::create([
            'id' => 6,
            'name' => 'pegawai',
            'keterangan' => 'Hak akses sebagai Pegawai PNS/Non PNS'
        ]);



    }
}
