<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;

    protected $table = 'galeries';  
    protected $primaryKey = 'id_galeri';  

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}