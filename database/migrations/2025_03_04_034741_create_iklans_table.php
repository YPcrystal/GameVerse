<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIklansTable extends Migration
{
    public function up()
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->integer('durasi');
            $table->integer('harga');
            $table->enum('status', ['pending', 'aktif'])->default('pending');
            $table->integer('shown_count')->default(0); // opsional, untuk landing page
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iklans');
    }
}