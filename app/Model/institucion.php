<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'institucion';

    public $timestamps = false;

    protected $primaryKey = 'id_jardin';

    protected $fillable = [
        'nit_jardin',
        'nombre_jardin',
        'direccion',
        'ciudad',
        'celular',
        'telefono',
        'logo',
        'administrador_id_admin'
    ];

    public function docentes()
    {
        return $this->hasMany('App\Model\docente','institudcion_id_jardin','id_jardin');
    }
  
}
