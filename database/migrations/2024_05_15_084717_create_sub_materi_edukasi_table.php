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
        Schema::create('sub_materi_edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('body');
            $table->string('modul');
            $table->string('video')->nullable();
            $table->unsignedBigInteger('materi_edukasi_id');
            $table->foreign('materi_edukasi_id')->references('id')->on('materi_edukasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_materi_edukasi');
    }
};
