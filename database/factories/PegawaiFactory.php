<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_depan' => fake()->firstName,
            'nama_tengah' => '',
            'nama_belakang' => fake()->lastName,
            'email' => fake()->email,
            'no_hp' => fake()->phoneNumber,
            'gambar' => '',
            'ktp' => '',
            'kk' => '',
            'ijazah' => '',
            'transkip_nilai' => '',
            'akte_kelahiran' => '',
            'akte_pernikahan' => '',
            'bidang_id' => 1,
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
            'user_id' => 2,
            'published_at' => now(),
        ];
    }
}
