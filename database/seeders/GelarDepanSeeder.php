<?php

namespace Database\Seeders;

use App\Models\GelarDepan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarDepanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        GelarDepan::create(
            [
                'gelar_depan' => 'Dr.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => now(),
            ]
        );
        
        GelarDepan::create(
            [
                'gelar_depan' => 'Drs.',
                'keterangan' => 'keterangan terkait gelar...',
                'deleted_at' => now(),
            ]
        );

        GelarDepan::create(
            [
                'gelar_depan' => 'dr.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => null,
            ]
        );

        GelarDepan::create(
            [
                'gelar_depan' => 'Prof.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => null,
            ]
        );
    }
}
