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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('platform');
            $table->string('genre');
            $table->date('tanggal_rilis');
            $table->string('developer');
            $table->string('publisher');
            $table->text('deskripsi_singkat');
            $table->string('gambar_cover');
            $table->string('trailer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};