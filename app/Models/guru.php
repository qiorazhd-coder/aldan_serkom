<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class guru extends Model
{
    use HasUuids;

    protected $table = "guru";
    protected $primaryKey = "id_guru";
    protected $keyType = 'string';

    protected $guarded =[];

}
