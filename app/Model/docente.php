<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'docente';

    public $timestamps = false;

    protected $primaryKey = 'id_docente';

    protected $fillable = [
        'documento',
        'nombre',
        'correo',
        'telefono',
        'direccion',
        'username',
        'contrasena',
        'institucion_id_jardin',
        'rol_id_rol'
    ];

  
    public function institucion()
    {
        return $this->belongsTo('App\Model\institucion', 'id_jardin','institucion_id_jardin' );
    }
}
