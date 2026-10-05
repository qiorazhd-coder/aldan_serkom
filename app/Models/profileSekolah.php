<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class profileSekolah extends Model
{
    use HasUuids;

    protected $table = "profile_sekolah";
    protected $primaryKey = "id_profile_sekolah";
    protected $keyType = 'string';

    protected $guarded = [];
}
