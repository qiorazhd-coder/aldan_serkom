<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galeri'; 
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'judul',
        'jenis',
        'deskripsi',
        'foto',
        'video',
    ];
}