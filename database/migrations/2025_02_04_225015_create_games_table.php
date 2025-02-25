<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255)->unique();
            $table->string('platform', 100);
            $table->string('genre', 100);
            $table->date('tanggal_rilis');
            $table->string('developer', 255);
            $table->string('publisher', 255);
            $table->text('deskripsi_singkat');
            $table->string('gambar_cover', 255)->nullable();
            $table->string('trailer', 255)->nullable();
            $table->decimal('rating_rata_rata', 3, 2)->nullable(); // Tambahkan kolom rating_rata_rata
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};