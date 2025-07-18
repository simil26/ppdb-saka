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
        Schema::create('dokumen_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->string('pas_foto')->default('-');
            $table->string('kk')->default('-');
            $table->string('akte')->default('-');
            $table->string('ktp')->default('-');
            $table->string('kip')->default('-');
            $table->string('kis')->default('-');
            $table->string('kks')->default('-');
            $table->string('kps')->default('-');
            $table->string('pkh')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendafatarans');
    }
};
