<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;

    protected $table = 'galeries'; // Sesuaikan dengan nama tabel di DB (galeries/galeri)
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}