<?php

namespace Database\Seeders;

use App\Models\Kontrak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontrak::create(
            [
                'kontrak' => 'Kontrak bulan Maret 2024',
                'keterangan' => '',
            ]
        );

        Kontrak::create(
            [
                'kontrak' => 'Kontrak bulan April 2024',
                'keterangan' => ' ',
            ]
        );
    }
}
