<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tema extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'tema';

    public $timestamps = false;

    protected $primaryKey = 'idtema';

    protected $fillable = [
        'nombre',
        'numero',
        'contenido',
        'apoyo',
        'foro',
        'curso_docente_id_docente'
    ];

  
}
