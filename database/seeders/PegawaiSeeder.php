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
                'ktp' => 'ktp.png',
                'kk' => 'kk.png',
                'ijazah' => 'ijazah.png',
                'transkip_nilai' => 'transkip_nilai.png',
                'akte_kelahiran' => 'akte_kelahiran.png',
                'akte_pernikahan' => 'akte_pernikahan.png',
                'bidang_id' => fake()->numberBetween(1, 12),
                'lokasi_id' => fake()->numberBetween(1, 5),
                'jenis_kelamin_id' => fake()->numberBetween(1, 2),
                'agama_id' => fake()->numberBetween(1, 5),
                'pangkat_golongan_id' => fake()->numberBetween(1, 5),
                'suku_id' => fake()->numberBetween(1, 5),
                'distrik_id' => fake()->numberBetween(1, 5),
                'kelurahan_id' => fake()->numberBetween(1, 5),
                'deskripsi_tugas_id' => fake()->numberBetween(1, 5),
                'gelar_depan_id' => fake()->numberBetween(1, 5),
                'gelar_belakang_id' => fake()->numberBetween(1, 5),
                'gelar_akademis_id' => fake()->numberBetween(1, 5),
                'jenjang_pendidikan_id' => fake()->numberBetween(1, 5),
                'status_perkawinan_id' => fake()->numberBetween(1, 5),
                'jabatan_id' => fake()->numberBetween(1, 5),
                'keterangan' => '',
                'catatan' => '',
                'user_id' => null,
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
                'ktp' => 'ktp.png',
                'kk' => 'kk.png',
                'ijazah' => 'ijazah.png',
                'transkip_nilai' => 'transkip_nilai.png',
                'akte_kelahiran' => 'akte_kelahiran.png',
                'akte_pernikahan' => 'akte_pernikahan.png',
                'bidang_id' => fake()->numberBetween(1, 12),
                'lokasi_id' => fake()->numberBetween(1, 5),
                'jenis_kelamin_id' => fake()->numberBetween(1, 2),
                'agama_id' => fake()->numberBetween(1, 5),
                'pangkat_golongan_id' => fake()->numberBetween(1, 5),
                'suku_id' => fake()->numberBetween(1, 5),
                'distrik_id' => fake()->numberBetween(1, 5),
                'kelurahan_id' => fake()->numberBetween(1, 5),
                'deskripsi_tugas_id' => fake()->numberBetween(1, 5),
                'gelar_depan_id' => fake()->numberBetween(1, 5),
                'gelar_belakang_id' => fake()->numberBetween(1, 5),
                'gelar_akademis_id' => fake()->numberBetween(1, 5),
                'jenjang_pendidikan_id' => fake()->numberBetween(1, 5),
                'status_perkawinan_id' => fake()->numberBetween(1, 5),
                'jabatan_id' => fake()->numberBetween(1, 5),
                'keterangan' => '',
                'catatan' => '',
                'user_id' => null,
                'deleted_at' => now(),
            ],
        ])->each(function ($items) {
            for ($i = 0; $i < 5; $i++) {
                $items['bidang_id'] = fake()->numberBetween(1, 12);
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
