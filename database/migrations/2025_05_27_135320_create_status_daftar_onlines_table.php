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
        Schema::create('status_daftar_onlines', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->enum('statusBiodata', [0, 1])->default(0);
            $table->enum('statusDataOrangTua', [0, 1])->default(0);
            $table->enum('statusDataPeriodik', [0, 1])->default(0);
            $table->enum('statusKesejahteraan', [0, 1])->default(0);
            $table->enum('statusDokumenPendaftaran', [0, 1])->default(0);
            $table->enum('statusFinalisasi', [0, 1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_daftar_onlines');
    }
};
