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
            ['bidang' => 'Contoh Data di Publik', 'keterangan' => 'Keterangan tentang bidang...', 'published_at' => now()],
            ['bidang' => 'Contoh Data di Tempat Sampah', 'keterangan' => 'Keterangan tentang bidang...', 'deleted_at' => now()],
            
            ['bidang' => 'Staf Administrasi', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'BANK Sampah', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Sopir Truck', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Pengangkutan Sampah', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Sopir Ambrol 53', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Pengangkutan Sampah', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Sopir', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Pembabatan Jalan', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Mobasah', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Penyisiran Jalan', 'keterangan' => 'Keterangan tentang bidang...'],
            ['bidang' => 'Petugas Penyapuan', 'keterangan' => 'Keterangan tentang bidang...']
        ]);
        $data->each(function ($collection) {
            Bidang::create($collection);
        });
    }
}
