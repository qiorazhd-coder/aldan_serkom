<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id_berita');
            $table->string('judul', 50);
            $table->text('isi');
            $table->date('tanggal')->nullable();
            $table->string('gambar', 100)->nullable();
            $table->unsignedInteger('id_user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};