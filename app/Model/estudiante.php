<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'estudiante';

    public $timestamps = false;

    protected $primaryKey = 'id_estudiante';

    protected $fillable = [
        'documento',
        'nombre',
        'nombre_padre',
        'nacimiento',
        'direccion',
        'correo',
        'telefono',
        'username',
        'contrasena',
        'institucion_id_jardin',
        'curso_id_curso',
        'rol_id_rol'
    ];

    public function comentarios()
    {
        return $this->hasMany('App\Model\foro_comentario','estudiante_idestudiante','id_estudiante');
    }

    public function cursos()
    {
        return $this->belongsToMany(curso::class,'curso_estudiante','estudiante_idestudiante','curso_idcurso')->using(curso_estudiante::class)->withPivot('idcursoestudiante');
    }
  
}
