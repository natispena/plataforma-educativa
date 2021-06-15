<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rector extends Model
{
    protected $connection = 'mysql';

    protected $table = 'rector';

    public $timestamps = false;

    protected $primaryKey = 'id_rector';

    protected $fillable = [
        'documento_rector',
        'nombre_rector',
       
        'telefono',
        'username',
        'contrasena',
        'institucion_id_jardin',
        'rol_id_rol'
    ];
}
