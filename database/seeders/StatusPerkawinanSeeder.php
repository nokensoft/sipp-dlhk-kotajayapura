<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPerkawinan::create(
            [
                'status_perkawinan' => 'Sudah Kawin',
                'keterangan' => '',
            ]
        );

        StatusPerkawinan::create(
            [
                'status_perkawinan' => 'Belum Kawin',
                'keterangan' => '',
            ]
        );
    }
}
