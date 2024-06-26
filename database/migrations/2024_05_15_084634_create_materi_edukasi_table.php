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
        Schema::create('materi_edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul_materi');
            $table->unsignedBigInteger('jenis_edukasi_id');
            $table->foreign('jenis_edukasi_id')->references('id')->on('jenis_edukasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_edukasi');
    }
};
