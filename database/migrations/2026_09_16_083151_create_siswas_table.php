<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nisn', 20)->unique();
            $table->string('nama');
            $table->string('kelas', 50)->nullable();
            $table->string('jurusan', 100)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P', 'Laki-laki', 'Perempuan']);
            $table->string('tahun_masuk', 10)->nullable(); // Tambahkan kolom ini
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};