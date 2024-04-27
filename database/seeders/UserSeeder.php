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
        User::create([
            'username' => 'admin',
            'password' => bcrypt('123'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'abdul-jabbar',
            'password' => bcrypt('123'),
            'role_id' => 2
        ]);
    }
}
