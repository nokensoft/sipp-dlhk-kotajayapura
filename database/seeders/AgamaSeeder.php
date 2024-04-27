<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agama::create(
            [
                'agama' => 'Kristen Protestan',
                'keterangan' => 'Agama Kristen Protestan'
            ]
        );

        Agama::create(
            [
                'agama' => 'Islam',
                'keterangan' => 'Agama Islam'
            ]
        );

        Agama::create(
            [
                'agama' => 'Katolik',
                'keterangan' => 'Agama Katolik'
            ]
        );

        Agama::create(
            [
                'agama' => 'Hindu',
                'keterangan' => 'Agama Hindu'
            ]
        );

        Agama::create(
            [
                'agama' => 'Budha',
                'keterangan' => 'Agama Budha'
            ]
        );
    }
}
