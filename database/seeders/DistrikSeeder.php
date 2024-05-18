<?php

namespace Database\Seeders;

use App\Models\Distrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distrik::create(
            [
                'distrik' => 'Abepura',
                'keterangan' => 'Distrik Abepura',
                'published_at' => now(),
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Jayapura Utara',
                'keterangan' => 'Distrik Jayapura Utara',
                'published_at' => now(),
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Jayapura Selatan',
                'keterangan' => 'Distrik Jayapura Selatan',
                'published_at' => null,
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Muara Tami',
                'keterangan' => 'Distrik Muara Tami',
                'deleted_at' => now(),
            ]
        );
    }
}
