<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class berita extends Model
{

    use HasUuids;
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    protected $keyType = 'string';
    
    protected $guarded =[];
}
