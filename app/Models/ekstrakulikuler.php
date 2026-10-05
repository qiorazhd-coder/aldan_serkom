<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ekstrakulikuler extends Model
{
    use HasUuids;

    protected $table = "ekstrakulikuler";
    protected $primaryKey = "id_ekstrakulikuler";
    protected $keyType = 'string';

    protected $guarded =[];
}
