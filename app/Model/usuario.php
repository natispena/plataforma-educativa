<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
   // protected $primaryKey = 'id_rector';
    protected $fillable = [
        'id_usuario',
        'username',
        'password',
        'rol_id'
    ];
}