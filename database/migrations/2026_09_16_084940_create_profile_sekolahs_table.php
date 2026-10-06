<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profile_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('kepala_sekolah')->nullable();
            $table->string('npsn', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->text('visi_misi')->nullable();
            $table->string('tahun_berdiri', 10)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_sekolah');
    }
};