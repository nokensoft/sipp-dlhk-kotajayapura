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
        // Pegawai::factory()->count(15)->create();

        collect([
            /*
                Koordinator Wilayah
            */ 
            [
                'id' => 1,
                'nama_depan' => 'Haerudin',
                'nama_tengah' => '',
                'nama_belakang' => '',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 2,
                'nama_depan' => 'Sion',
                'nama_tengah' => 'Saleh',
                'nama_belakang' => 'Ayomi',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 3,
                'nama_depan' => 'Haerudin',
                'nama_tengah' => '',
                'nama_belakang' => '',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 4,
                'nama_depan' => 'Nova',
                'nama_tengah' => '',
                'nama_belakang' => 'Suhara',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 5,
                'nama_depan' => 'Robert',
                'nama_tengah' => '',
                'nama_belakang' => 'Erubun',
                'is_asn' => true,
                'published_at' => now(),
            ],
            // -------------------------------------

            // Jayapura Utara
            [
                'id' => 101,
                'nama_depan' => 'Hengki',
                'nama_tengah' => '',
                'nama_belakang' => 'Amamehi',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 102,
                'nama_depan' => 'Yohanis',
                'nama_tengah' => '',
                'nama_belakang' => 'Mote',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 103,
                'nama_depan' => 'Victor',
                'nama_tengah' => '',
                'nama_belakang' => 'Mansbawer',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 104,
                'nama_depan' => 'La',
                'nama_tengah' => '',
                'nama_belakang' => 'Dani',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 105,
                'nama_depan' => 'Jefri',
                'nama_tengah' => '',
                'nama_belakang' => 'Awarawi',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 111,
                'nama_depan' => 'Jhon',
                'nama_tengah' => '',
                'nama_belakang' => 'Doom',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 112,
                'nama_depan' => 'Jefry',
                'nama_tengah' => '',
                'nama_belakang' => 'Wondiwoy',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 121,
                'nama_depan' => 'Yehezkiel',
                'nama_tengah' => '',
                'nama_belakang' => 'Wanimbo',
                'is_asn' => true,
                'published_at' => now(),
            ],

            // Jayapura Selatan
            [
                'id' => 201,
                'nama_depan' => 'Jamaludin',
                'nama_tengah' => '',
                'nama_belakang' => '',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 202,
                'nama_depan' => 'Bernard',
                'nama_tengah' => '',
                'nama_belakang' => 'Sineri',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 203,
                'nama_depan' => 'Kores',
                'nama_tengah' => '',
                'nama_belakang' => 'Reba',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 204,
                'nama_depan' => 'Juniarty',
                'nama_tengah' => '',
                'nama_belakang' => 'Waroy',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 211,
                'nama_depan' => 'Isak',
                'nama_tengah' => 'Samuel',
                'nama_belakang' => 'Amamehi',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 212,
                'nama_depan' => 'Lurans',
                'nama_tengah' => '',
                'nama_belakang' => 'Raunsay',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 221,
                'nama_depan' => 'Yulistio',
                'nama_tengah' => '',
                'nama_belakang' => 'Amamehi',
                'is_asn' => true,
                'published_at' => now(),
            ],

            // Abepura
            [
                'id' => 301,
                'nama_depan' => 'Ayub',
                'nama_tengah' => '',
                'nama_belakang' => 'Yawa',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 302,
                'nama_depan' => 'Yohanis',
                'nama_tengah' => '',
                'nama_belakang' => 'Ur',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 303,
                'nama_depan' => 'Philipus',
                'nama_tengah' => '',
                'nama_belakang' => 'Kossy',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 304,
                'nama_depan' => 'Herodia',
                'nama_tengah' => 'S.',
                'nama_belakang' => 'Tiba',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 311,
                'nama_depan' => 'Oni',
                'nama_tengah' => '',
                'nama_belakang' => 'Letsoin',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 312,
                'nama_depan' => 'Alfred',
                'nama_tengah' => '',
                'nama_belakang' => 'Amsor',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 313,
                'nama_depan' => 'Yustus',
                'nama_tengah' => '',
                'nama_belakang' => 'Merahabia',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 321,
                'nama_depan' => 'Obeth',
                'nama_tengah' => '',
                'nama_belakang' => 'Aboda',
                'is_asn' => true,
                'published_at' => now(),
            ],

            // Muara Tami

            // Heram
            [
                'id' => 501,
                'nama_depan' => 'Irpan',
                'nama_tengah' => '',
                'nama_belakang' => 'Bolewan',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 502,
                'nama_depan' => 'Ham',
                'nama_tengah' => '',
                'nama_belakang' => 'Erubun',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 503,
                'nama_depan' => 'Benyamin',
                'nama_tengah' => '',
                'nama_belakang' => 'Bolatimuhe',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 511,
                'nama_depan' => 'Penias',
                'nama_tengah' => '',
                'nama_belakang' => 'Eleuyanan',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 521,
                'nama_depan' => 'Yakobus',
                'nama_tengah' => '',
                'nama_belakang' => 'Suhuniap',
                'is_asn' => true,
                'published_at' => now(),
            ],

            // TPA
            [
                'id' => 601,
                'nama_depan' => 'Amsal',
                'nama_tengah' => '',
                'nama_belakang' => 'Awi',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 602,
                'nama_depan' => 'Trio',
                'nama_tengah' => '',
                'nama_belakang' => 'Pasaribu',
                'is_asn' => true,
                'published_at' => now(),
            ],
            [
                'id' => 611,
                'nama_depan' => 'Yusuf',
                'nama_tengah' => '',
                'nama_belakang' => 'Sato',
                'is_asn' => true,
                'published_at' => now(),
            ],

            // [
            //     'nama_depan' => fake()->firstName,
            //     'nama_tengah' => '',
            //     'nama_belakang' => fake()->lastName,
            //     'email' => '',
            //     'no_hp' => '',
            //     'gambar' => fake()->randomElement(
            //         [
            //             'avatars/man.png',
            //             'avatars/girl.png',
            //             'avatars/man1.png',
            //             'avatars/girl-2.png'
            //         ]
            //     ),
            //     'ktp' => 'ktp.png',
            //     'kk' => 'kk.png',
            //     'ijazah' => 'ijazah.png',
            //     'transkip_nilai' => 'transkip_nilai.png',
            //     'akte_kelahiran' => 'akte_kelahiran.png',
            //     'akte_pernikahan' => 'akte_pernikahan.png',
            //     'bidang_id' => fake()->numberBetween(1, 12),
            //     'lokasi_id' => fake()->numberBetween(1, 42),
            //     'jenis_kelamin_id' => fake()->numberBetween(1, 2),
            //     'agama_id' => fake()->numberBetween(1, 5),
            //     'pangkat_golongan_id' => fake()->numberBetween(1, 5),
            //     'suku_id' => fake()->numberBetween(1, 2),
            //     'distrik_id' => fake()->numberBetween(1, 5),
            //     'kelurahan_id' => fake()->numberBetween(1, 5),
            //     'deskripsi_tugas_id' => fake()->numberBetween(1, 5),
            //     'gelar_depan_id' => fake()->numberBetween(1, 5),
            //     'gelar_belakang_id' => fake()->numberBetween(1, 5),
            //     'gelar_non_akademis_id' => fake()->numberBetween(1, 5),
            //     'jenjang_pendidikan_id' => fake()->numberBetween(1, 5),
            //     'status_perkawinan_id' => fake()->numberBetween(1, 5),
            //     'jabatan_id' => fake()->numberBetween(1, 5),
            //     'keterangan' => '',
            //     'catatan' => '',
            //     'user_id' => null,
            //     'published_at' => now(),
            // ],
            // [
            //     'nama_depan' => fake()->firstName,
            //     'nama_tengah' => '',
            //     'nama_belakang' => fake()->lastName,
            //     'email' => '',
            //     'no_hp' => '',
            //     'gambar' => fake()->randomElement(
            //         [
            //             'avatars/man.png',
            //             'avatars/girl.png',
            //             'avatars/man1.png',
            //             'avatars/girl-2.png'
            //         ]
            //     ),
            //     'ktp' => 'ktp.png',
            //     'kk' => 'kk.png',
            //     'ijazah' => 'ijazah.png',
            //     'transkip_nilai' => 'transkip_nilai.png',
            //     'akte_kelahiran' => 'akte_kelahiran.png',
            //     'akte_pernikahan' => 'akte_pernikahan.png',
            //     'bidang_id' => fake()->numberBetween(1, 12),
            //     'lokasi_id' => fake()->numberBetween(1, 42),
            //     'jenis_kelamin_id' => fake()->numberBetween(1, 2),
            //     'agama_id' => fake()->numberBetween(1, 5),
            //     'pangkat_golongan_id' => fake()->numberBetween(1, 5),
            //     'suku_id' => fake()->numberBetween(1, 2),
            //     'distrik_id' => fake()->numberBetween(1, 5),
            //     'kelurahan_id' => fake()->numberBetween(1, 5),
            //     'deskripsi_tugas_id' => fake()->numberBetween(1, 5),
            //     'gelar_depan_id' => fake()->numberBetween(1, 5),
            //     'gelar_belakang_id' => fake()->numberBetween(1, 5),
            //     'gelar_non_akademis_id' => fake()->numberBetween(1, 5),
            //     'jenjang_pendidikan_id' => fake()->numberBetween(1, 5),
            //     'status_perkawinan_id' => fake()->numberBetween(1, 5),
            //     'jabatan_id' => fake()->numberBetween(1, 5),
            //     'keterangan' => '',
            //     'catatan' => '',
            //     'user_id' => null,
            //     'deleted_at' => now(),
            // ],
            
        ])->each(function ($items) {
            // for ($i = 0; $i < 5; $i++) {
            //     $items['bidang_id'] = fake()->numberBetween(1, 12);
            //     $items['lokasi_id'] = fake()->numberBetween(1, 42);
            //     $items['suku_id'] = fake()->numberBetween(1, 2);
            //     Pegawai::create($items);
            // }
            Pegawai::create($items);
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
