<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita'; // Sesuaikan jika primary key tabel berita kamu id_berita

    protected $fillable = [
        'id_user',
        'judul',
        'isi',
        'gambar',
    ];
}