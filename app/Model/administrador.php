<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'administrador';

    public $timestamps = false;

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'documento_admin',
        'nombre_admin',
        'telefono',
        'username',
        'contrasena',
        'rol_id_rol'
    ];

  
}
