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
        $adminMaster =  User::create([
            'username' => 'admin',
            'password' => bcrypt('123'),
            'role_id' => 1
        ]);
        $adminMaster->assignRole('adminmaster');

       $pengawai = User::create([
            'username' => 'abdul-jabbar',
            'password' => bcrypt('123'),
            'role_id' => 2
        ]);
        $pengawai->assignRole('pegawai');

    }
}
