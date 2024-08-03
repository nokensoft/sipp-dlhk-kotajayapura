<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_tengah')->nullable();
            $table->string('nama_belakang')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_asn')->default(true); //true (1) = asn, false (0) = non asn

            // file
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('transkip_nilai')->nullable();
            $table->string('akte_kelahiran')->nullable();
            $table->string('akte_pernikahan')->nullable();

            // Data Master
            $table->bigInteger('lapangan_id')->nullable();
            $table->bigInteger('bidang_id')->nullable();
            $table->bigInteger('lokasi_id')->nullable();
            $table->bigInteger('jenis_kelamin_id')->nullable();
            $table->bigInteger('agama_id')->nullable();
            $table->bigInteger('pangkat_golongan_id')->nullable();
            $table->bigInteger('suku_id')->nullable();
            $table->bigInteger('distrik_id')->nullable();
            $table->bigInteger('kelurahan_id')->nullable();
            $table->bigInteger('jabatan_id')->nullable();
            $table->bigInteger('deskripsi_tugas_id')->nullable();
            $table->bigInteger('gelar_depan_id')->nullable();
            $table->bigInteger('gelar_belakang_id')->nullable();
            $table->bigInteger('gelar_non_akademis_id')->nullable();
            $table->bigInteger('jenjang_pendidikan_id')->nullable();
            $table->bigInteger('status_perkawinan_id')->nullable();
            $table->mediumText('keterangan')->nullable();
            $table->mediumText('catatan')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
