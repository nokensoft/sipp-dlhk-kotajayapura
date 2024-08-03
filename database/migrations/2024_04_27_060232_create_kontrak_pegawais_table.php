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
        Schema::create('kontrak_pegawais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kontrak_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('nomor_kontrak')->nullable();
            $table->string('tahun_kontrak')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->bigInteger('wilayah_id')->nullable();
            $table->bigInteger('lapangan_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->enum('status_kontrak', ['Berjalan', 'Penggantian'])->default('Berjalan');

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
        Schema::dropIfExists('kontrak_pegawais');
    }
};
