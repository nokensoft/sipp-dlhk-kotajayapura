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
                'keterangan' => 'Distrik Abepura'
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Jayapura Utara',
                'keterangan' => 'Distrik Jayapura Utara'
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Jayapura Selatan',
                'keterangan' => 'Distrik Jayapura Selatan'
            ]
        );

        Distrik::create(
            [
                'distrik' => 'Muara Tami',
                'keterangan' => 'Distrik Muara Tami'
            ]
        );
    }
}
