<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::factory()->count(15)->create();
        
        collect([
            [
                'nama_depan' => fake()->firstName, 
                'nama_tengah' => '', 
                'nama_belakang' => fake()->lastName, 
                'email' => '', 
                'no_hp' => '', 
                'gambar' => fake()->randomElement(
                    [
                        'avatars/man.png', 
                        'avatars/girl.png', 
                        'avatars/man1.png',
                        'avatars/girl-2.png'
                    ]
                ), 
                'ktp' => '', 
                'kk' => '', 
                'ijazah' => '', 
                'transkip_nilai' => '', 
                'akte_kelahiran' => '', 
                'akte_pernikahan' => '', 
                'bidang_id' => 1, 
                'lokasi_id' => 1, 
                'jenis_kelamin_id' => 1, 
                'agama_id' => 1, 
                'pangkat_golongan_id' => 1, 
                'suku_id' => 1, 
                'distrik_id' => 1, 
                'kelurahan_id' => 1, 
                'deskripsi_tugas_id' => 1, 
                'gelar_depan_id' => 1, 
                'gelar_belakang_id' => 1, 
                'gelar_akademis_id' => 1, 
                'jenjang_pendidikan_id' => 1, 
                'status_perkawinan_id' => 1, 
                'keterangan' => '', 
                'catatan' => '', 
                'user_id' => 2, 
                'published_at' => now(),
            ],
            [
                'nama_depan' => fake()->firstName, 
                'nama_tengah' => '', 
                'nama_belakang' => fake()->lastName, 
                'email' => '', 
                'no_hp' => '',  
                'gambar' => fake()->randomElement(
                    [
                        'avatars/man.png', 
                        'avatars/girl.png', 
                        'avatars/man1.png',
                        'avatars/girl-2.png'
                    ]
                ), 
                'ktp' => '', 
                'kk' => '', 
                'ijazah' => '', 
                'transkip_nilai' => '', 
                'akte_kelahiran' => '', 
                'akte_pernikahan' => '', 
                'bidang_id' => 1, 
                'lokasi_id' => 1, 
                'jenis_kelamin_id' => 1, 
                'agama_id' => 1, 
                'pangkat_golongan_id' => 1, 
                'suku_id' => 1, 
                'distrik_id' => 1, 
                'kelurahan_id' => 1, 
                'deskripsi_tugas_id' => 1, 
                'gelar_depan_id' => 1, 
                'gelar_belakang_id' => 1, 
                'gelar_akademis_id' => 1, 
                'jenjang_pendidikan_id' => 1, 
                'status_perkawinan_id' => 1, 
                'keterangan' => '', 
                'catatan' => '', 
                'user_id' => 2, 
                'deleted_at' => now(),
            ],
        ])->each(function ($items) {
            for ($i = 0; $i < 5; $i++) {
                Pegawai::create($items);
            }
        });

    }
}


/*
Abdul Jabbaar
Natalia Kristy Merauje
Andi Akbar
Johanna Syane Kailola
Erich R. R. M. Ronaldi Waromi
Muhammad Asrul A. Rachman
Heryn Ahmad Adriandy
Efrain Silubun
Iin Pongsapan
Jesepus Gatot R. Rainau
...
*/