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
        Pegawai::create([
            'nama_depan' => 'Abdul',
            'nama_tengah' => '',
            'nama_belakang' => 'Jabbar',
            'email' => '',
            'no_hp' => '',
            'gambar' => '',

            // dokumen
            'ktp' => '',
            'kk' => '',
            'ijazah' => '',
            'transkip_nilai' => '',
            'akte_kelahiran' => '',
            'akte_pernikahan' => '',

            // data master
            'bidang_kerja_id' => 1,
            'lokasi_kerja_id' => 1,
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
        ]);
    }
}
