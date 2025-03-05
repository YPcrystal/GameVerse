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
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->integer('durasi');
            $table->integer('harga');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iklans');
    }
}