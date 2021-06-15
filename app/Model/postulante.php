<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class postulante extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'postulante';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'documento',
        'nombre',
        'nacimiento',
        'correo',
        'telefono'

    ];

  
}
