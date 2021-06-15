<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class entrega extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'entrega';

    public $timestamps = false;

    protected $primaryKey = 'identrega';

    protected $fillable = [
        'tema_numero',
        'tarea_numero',
        'estudiante_nombre',
        'tarea_tarea_est',
        'observacion'
    ];

  
}
