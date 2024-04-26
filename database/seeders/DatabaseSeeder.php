<?php

namespace Database\Seeders;

use App\Models\Distrik;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()->withPersonalTeam()->create([
            'name' => 'admin',
            'email' => bcrypt('123'),
        ]);

       $this->call([

            // Datamaster
            LokasiKerjaSeeder::class,
            JenisKelaminSeeder::class,
            AgamaSeeder::class,
            PangkatGolonganSeeder::class,
            SukuSeeder::class,
            DistrikSeeder::class,
       ]);
    }
}
