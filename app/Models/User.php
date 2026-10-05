<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'name',
        'username',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
        ];
}
