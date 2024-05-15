<?php

namespace Database\Seeders;

use App\Models\GelarDepan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarDepanSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'gelar_depan' => 'Dr.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => now(),
            ],
            [
                'gelar_depan' => 'Drs.',
                'keterangan' => 'keterangan terkait gelar...',
                'deleted_at' => now(),
            ],
            [
                'gelar_depan' => 'dr.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => null,
            ],
            [
                'gelar_depan' => 'Prof.',
                'keterangan' => 'keterangan terkait gelar...',
                'published_at' => null,
            ]
        ])->each(function ($collection) {
            GelarDepan::create($collection);
        });
    }
}
