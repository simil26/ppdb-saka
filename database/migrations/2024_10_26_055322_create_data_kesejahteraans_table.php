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
        Schema::create('data_kesejahteraans', function (Blueprint $table) {
            $table->id();
            $table->string('noreg_ppdb')->unique();
            $table->enum('is_kip', [0, 1]);
            $table->enum('is_kis', [0, 1]);
            $table->enum('is_kks', [0, 1]);
            $table->enum('is_kps', [0, 1]);
            $table->enum('is_pkh', [0, 1]);
            $table->string('nomor_kip');
            $table->string('nomor_kis');
            $table->string('nomor_kks');
            $table->string('nomor_kps');
            $table->string('nomor_pkh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kesejahteraans');
    }
};
