<?php

namespace Database\Seeders;

use App\Models\GelarNonAkademis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GelarNonAkademisSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'gelar_non_akademis' => "CPA",
                'keterangan' => 'Certified Public Accountant (CPA)',
                'published_at' => now(),
            ],
            [
                'gelar_non_akademis' => 'CISSP',
                'keterangan' => 'Certified Information Systems Security Profesional (CISSP)',
                'deleted_at' => now(),
            ],
            [
                'gelar_non_akademis' => 'PMP',
                'keterangan' => 'Project Management Professional (PMP)',
                'published_at' => null,
            ]
        ])->each(function ($collection) {
            GelarNonAkademis::create($collection);
        });
    }
}
