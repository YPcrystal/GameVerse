<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id'); // Foreign key ke tabel games
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel users (jika ada)
            $table->integer('rating'); // Rating (misalnya, 1-5)
            $table->text('review'); // Ulasan
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Jika ada user
        });
    }

    // ...
};