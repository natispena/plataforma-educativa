<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'foro';

    public $timestamps = false;

    protected $primaryKey = 'idforo';

    protected $fillable = [
        'nombre' ,
        'contenido' ,
        'tema_idtema' ,
        'docente_iddocente'


    ];

    public function comentarios()
    {
        return $this->hasMany('App\Model\foro_comentario','foro_idforo','idforo');
    }

  
}