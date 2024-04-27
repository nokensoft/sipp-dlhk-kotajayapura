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
            $table->bigInteger('kontrak_id');
            $table->bigInteger('pengawai_id');
            $table->string('tanggal');
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
