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
        Schema::create('ulasan_edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('ulasan');
            $table->unsignedBigInteger('sub_materi_edukasi_id');
            $table->foreign('sub_materi_edukasi_id')->references('id')->on('sub_materi_edukasi');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_edukasi');
    }
};
