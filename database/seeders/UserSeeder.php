<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        // adminmaster
        $adminmaster =  User::create([
            'username' => 'adminmaster',
            'password' => bcrypt('adminmaster'),
            // 'role_id' => 1 //adminmaster
        ]);
        $adminmaster->assignRole('adminmaster');

        // operator
        $operator =  User::create([
            'username' => 'operator',
            'password' => bcrypt('operator'),
            // 'role_id' => 2 // operator
        ]);
        $operator->assignRole('operator');

        // kepaladinas
        $kepaladinas =  User::create([
            'username' => 'kepaladinas',
            'password' => bcrypt('kepaladinas'),
            // 'role_id' => 3 // kepaladinas
        ]);
        $kepaladinas->assignRole('kepaladinas');

        // kepalabidang
        $kepalabidang =  User::create([
            'username' => 'kepalabidang',
            'password' => bcrypt('kepalabidang'),
            // 'role_id' => 4 // kepalabidang
        ]);
        $kepalabidang->assignRole('kepalabidang');

        // kepalaseksi
        $kepalaseksi =  User::create([
            'username' => 'kepalaseksi',
            'password' => bcrypt('kepalaseksi'),
            // 'role_id' => 5 // kepalaseksi
        ]);
        $kepalaseksi->assignRole('kepalaseksi');

        // pegawai
        $pegawai =  User::create([
            'username' => 'pegawai',
            'password' => bcrypt('pegawai'),
            // 'role_id' => 6 // pegawai
        ]);
        $pegawai->assignRole('pegawai');

    }
}


/*
    roles:
    1 = adminmaster
    2 = operator
    3 = kepaladinas
    4 = kepalabidang
    5 = kepalaseksi
    6 = pegawai
*/
