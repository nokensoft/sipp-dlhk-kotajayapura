<?php

namespace Database\Seeders;

use App\Models\Suku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suku::create(
            [
                'suku' => 'Tobati',
                'keterangan' => 'Suku tobati',
                'published_at' => now(),
            ]
        );

        Suku::create(
            [
                'suku' => 'Maybrat',
                'keterangan' => 'Suku maybrat',
                'published_at' => now(),
            ]
        );

        Suku::create(
            [
                'suku' => 'Enggros',
                'keterangan' => 'Suku Enggros',
                'published_at' => now(),
            ]
        );

        Suku::create(
            [
                'suku' => 'Moi',
                'keterangan' => 'Suku Moi',
                'published_at' => null,
            ]
        );

        Suku::create(
            [
                'suku' => 'Toraja',
                'keterangan' => 'Suku Toraja',
                'deleted_at' => now(),
            ]
        );
    }
}
