<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foro_respuesta extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'respuesta';

    public $timestamps = false;

    protected $primaryKey = 'idrespuesta';

    protected $fillable = [
        'respuesta' ,
        'fecha_creacion' ,
        'comentario_idcomentario',
        'estudiante_idestudiante'
        
        
  

    ];
    public function comentario()
    {
        return $this->belongsTo('App\Model\foro_comentario', 'idcomentario', 'comentario_idcomentario');
    }
    
    public function estudiante()
    {
        return $this->belongsTo('App\Model\estudiante', 'estudiante_idestudiante','id_estudiante');
    }


} 