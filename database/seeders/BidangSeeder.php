<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run(): void
    {
        $data = collect([
            ['bidang' => 'Pembabatan', 'keterangan' => 'Keterangan bidang...', 'published_at' => now()],
            ['bidang' => 'Penyapuan', 'keterangan' => 'Keterangan bidang...', 'published_at' => now()],
            ['bidang' => 'Penyisiran', 'keterangan' => 'Keterangan bidang...', 'published_at' => now()],
            ['bidang' => 'Pembabatan & Penyisiran', 'keterangan' => 'Keterangan bidang...', 'published_at' => now()],
            ['bidang' => 'Saluran Tebing', 'keterangan' => 'Keterangan bidang...', 'published_at' => now()],
        ]);
        $data->each(function ($collection) {
            Bidang::create($collection);
        });
    }
}
