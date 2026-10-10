<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->id('id_galeri');
            $table->string('judul')->nullable();
            $table->string('foto')->nullable();
            $table->string('video')->nullable(); 
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeries');
    }
};