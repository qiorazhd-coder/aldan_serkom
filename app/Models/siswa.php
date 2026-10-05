<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class siswa extends Model
{
    use HasUuids;

    protected $table = "siswa";
    protected $primaryKey = "id_siswa";
    protected $keyType = 'string';

    protected $guarded =[];
}
