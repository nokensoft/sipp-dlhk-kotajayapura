<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LokasiKerja;

class LokasiKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LokasiKerja::create(
            [
                'lokasi_kerja' => 'Pasar Cigombong',
                'latitude' =>  '-2.5988067',
                'longitude' => '140.6676441,17',
                'keterangan' => 'Lokasi kerja pasar cigombong kotaraja'
            ]
        );

        LokasiKerja::create(
            [
                'lokasi_kerja' => 'Kantor DLHK Kota Jayapura',
                'latitude' =>  '-2.5712146',
                'longitude' => '140.645366,13',
                'keterangan' => 'Lokasi kerja area Kantor DLHK Kota Jayapura'
            ]
        );

        LokasiKerja::create(
            [
                'lokasi_kerja' => 'BANK Sampah Waniyambe',
                'latitude' =>  '-2.5613572',
                'longitude' => '140.6903685,17',
                'keterangan' => 'Lokasi kerja area BANK Sampah Waniyambe '
            ]
        );

        LokasiKerja::create(
            [
                'lokasi_kerja' => 'Koya Kosso',
                'latitude' =>  '-2.671428',
                'longitude' => '140.756256',
                'keterangan' => 'Lokasi kerja area Koya Kosso '
            ]
        );


        LokasiKerja::create(
            [
                'lokasi_kerja' => 'Dolok - TPS',
                'latitude' =>  '-2.5916025',
                'longitude' => '140.5248039,12',
                'keterangan' => 'Lokasi kerja area Dolok - TPS '
            ]
        );
    }
}
