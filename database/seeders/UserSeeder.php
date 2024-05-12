<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // adminmaster
        $adminmaster =  User::create([
            'username' => 'adminmaster',
            'password' => bcrypt('adminmaster'),
            'role_id' => 1
        ]);
        $adminmaster->assignRole('adminmaster');

        // operator
        $operator =  User::create([
            'username' => 'operator',
            'password' => bcrypt('operator'),
            'role_id' => 2
        ]);
        $operator->assignRole('operator');

        // kepaladinas
        $kepaladinas =  User::create([
            'username' => 'kepaladinas',
            'password' => bcrypt('kepaladinas'),
            'role_id' => 3
        ]);
        $kepaladinas->assignRole('kepaladinas');

        // kepalabidang
        $kepalabidang =  User::create([
            'username' => 'kepalabidang',
            'password' => bcrypt('kepalabidang'),
            'role_id' => 4
        ]);
        $kepalabidang->assignRole('kepalabidang');

        // kepalaseksi
        $kepalaseksi =  User::create([
            'username' => 'kepalaseksi',
            'password' => bcrypt('kepalaseksi'),
            'role_id' => 5
        ]);
        $kepalaseksi->assignRole('kepalaseksi');

        // petugaslapangan
        $petugaslapangan =  User::create([
            'username' => 'petugaslapangan',
            'password' => bcrypt('petugaslapangan'),
            'role_id' => 6
        ]);
        $petugaslapangan->assignRole('petugaslapangan');

        // pegawai
        $pegawai =  User::create([
            'username' => 'pegawai',
            'password' => bcrypt('pegawai'),
            'role_id' => 7
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
    6 = petugaslapangan
    7 = pegawai
*/
