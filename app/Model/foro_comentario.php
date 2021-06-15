<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro_comentario extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'comentario';

    public $timestamps = false;

    protected $primaryKey = 'idcomentario';

    protected $fillable = [
        
        'comentario',
        'fecha_creacion' ,
        'foro_idforo',
       'estudiante_idestudiante'
        
       


    ];

    public function foro()
    {
        return $this->belongsTo('App\Model\foro', 'foro_idforo', 'idforo');
    }

    public function estudiante()
    {
        return $this->belongsTo('App\Model\estudiante', 'estudiante_idestudiante','id_estudiante');
    }

    public function respuestas()
    {
        return $this->hasMany('App\Model\foro_respuesta','comentario_idcomentario','idcomentario');
    }


  
}