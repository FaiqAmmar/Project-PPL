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
            $table->foreignId('materi_id');
            $table->string('judul');
            $table->text('body');
            $table->string('foto_path')->nullable();
            $table->string('video_path')->nullable();
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
