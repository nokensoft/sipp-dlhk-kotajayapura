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
        Schema::create('laporan_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('laporan_id')->unsigned();
            $table->enum('kepada', ['kepaladinas', 'kepalabidang', 'kepalaseksi'])->default('kepaladinas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_details');
    }
};
