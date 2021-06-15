<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    //
    protected $connection = 'mysql';

    protected $table = 'curso';

    public $timestamps = false;

    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'codigo',
        'nombre',
        'n_estudiantes',
        'docente_id_docente'
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(estudiante::class,'curso_estudiante','curso_idcurso','estudiante_idestudiante')->using(curso_estudiante::class)->withPivot('idcursoestudiante');
    }

    public function docente()
    {
        return $this->belongsTo('App\Model\docente', 'docente_id_docente', 'id_docente');
    }
}
