<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nisn', 10)->unique();
            $table->string('nama_siswa', 40);
            $table->string('kelas', 30); // <-- Kolom kelas ditambahkan
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->year('tahun_masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};