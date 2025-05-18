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
        Schema::create('status_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->enum('biodata_status', ['1', '0']);
            $table->enum('dataOrangTua_status', ['1', '0']);
            $table->enum('dataPeriodik_status', ['1', '0']);
            $table->enum('dataKesejahteraan_status', ['1', '0']);
            $table->enum('dokumenPendaftaran_status', ['1', '0']);
            $table->enum('ppdb_status', ['1', '0']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pendaftarans');
    }
};
