<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class curso_estudiante extends Pivot
{
    //
    protected $connection = 'mysql';

    protected $table = 'curso_estudiante';

    public $timestamps = false;

    protected $primaryKey = 'idcursoestudiante';

    protected $fillable = [
        
        'estado',
        'fecha_creacion' ,
        'curso_idcurso',
        'estudiante_idestudiante'

    ];
  
}