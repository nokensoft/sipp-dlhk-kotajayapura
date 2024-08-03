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
        Schema::create('kontraks', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('pegawai_id')->nullable();
            $table->bigInteger('lapangan_id')->nullable();

            $table->string('nomor');
            $table->string('tahun');
            
            $table->string('tanggal_mulai')->nullable();
            $table->string('tanggal_selesai')->nullable();
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->enum('status', ['Baru', 'Penggantian'])->default('Baru');
            
            $table->string('dokumen')->nullable();
            
            $table->text('keterangan')->nullable();

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
        Schema::dropIfExists('kontraks');
    }
};
