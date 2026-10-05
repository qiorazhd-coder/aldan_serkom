<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class galery extends Model
{
    use HasUuids;

    protected $table = "galeri";
    protected $primaryKey = "id_galeri";
    protected $keyType = 'string';

    protected $guarded =[];
}
