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
                'keterangan' => 'Suku tobati'
            ]
        );

        Suku::create(
            [
                'suku' => 'Maybrat',
                'keterangan' => 'Suku maybrat'
            ]
        );

        Suku::create(
            [
                'suku' => 'Enggros',
                'keterangan' => 'Suku Enggros'
            ]
        );

        Suku::create(
            [
                'suku' => 'Moi',
                'keterangan' => 'Suku Moi'
            ]
        );

        Suku::create(
            [
                'suku' => 'Toraja',
                'keterangan' => 'Suku Toraja'
            ]
        );
    }
}
