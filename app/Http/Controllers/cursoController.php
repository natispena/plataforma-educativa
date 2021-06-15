<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\docente;
use App\Model\curso;
use App\Model\curso_estudiante;
use App\Model\estudiante;

class cursoController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $cursos = curso::all();

        return view('curso.curso_listar',compact('titulo','cursos')); 
    }

    public function editar($id_curso){
        $curso = curso::find($id_curso);
        return view('curso.curso_editar',compact('curso')); 
    }

    public function nuevo(){
        $docentes = docente::all();
        return view('curso.curso_crear',compact("docentes"));
    }

    public function guardar(Request $request){
        
        curso::create([

            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
            'n_estudiantes' => $request['n_estudiantes'],
            'docente_id_docente' => $request['id_docente']
           
          ]);
          $titulo = 'Titulo';
          $cursos = curso::all();
  
          return view('curso.curso_listar',compact('titulo','cursos')); 
    }

    public function actualizar(Request $request,$id_curso){
        $curso = curso::find($id_curso);
        $curso['codigo'] = $request['codigo'];
        $curso['nombre']=$request['nombre'];
        $curso['n_estudiantes'] =$request['n_estudiantes'];
        

        $curso->update();
        $titulo = 'Titulo';
          $cursos = curso::all();
  
          return view('curso.curso_listar',compact('titulo','cursos')); 
    }

    //CURSO ESTUDIANTES

    public function estudiantes($id_curso){
        $curso = curso::find($id_curso);
        $estudiantes = $curso->estudiantes;

        return view('curso.curso_estudiantes_listar',compact('curso','estudiantes')); 
    }

    public function estudiantes_nuevo($id_curso){
        $curso = curso::find($id_curso);
        return view('curso.curso_estudiante_nuevo',compact("curso"));
    }

    public function estudiantes_buscar(Request $request){
        
        $curso = curso::find($request['idcurso']);
        
        $estudiantes = estudiante::Where('documento', 'like', '%' . $request['identificacion'] . '%')->get();
        
        return view('curso.curso_estudiante_buscar',compact('curso','estudiantes')); 

    }

    public function estudiantes_guardar($id_curso,$id_estudiante){
        curso_estudiante::create([

            'fecha_creacion' => date("Y-m-d H:i:s"),
            'curso_idcurso' => $id_curso,
            'estudiante_idestudiante' => $id_estudiante
           
          ]);
          
          $curso = curso::find($id_curso);
          $estudiantes = $curso->estudiantes;
          return view('curso.curso_estudiantes_listar',compact('curso','estudiantes')); 
    }

    public function estudiantes_eliminar($idcursoestudiante){
          $curso_estudiante = curso_estudiante::Where('idcursoestudiante',$idcursoestudiante)->First();
        
          $id_curso = $curso_estudiante->curso_idcurso;
          
          $delete = curso_estudiante::destroy($idcursoestudiante);
          
          $curso = curso::find($id_curso);
          $estudiantes = $curso->estudiantes;
          return view('curso.curso_estudiantes_listar',compact('curso','estudiantes')); 
    }

    //DOCENTE CURSO
    
    public function docente($id_curso){
        $curso = curso::find($id_curso);

        return view('curso.curso_docente_listar',compact('curso')); 

        
    }

    public function docente_buscar(Request $request){
        
        $curso = curso::find($request['idcurso']);
        
        $docentes = docente::Where('documento', 'like', '%' . $request['identificacion'] . '%')->get();
        
        return view('curso.curso_docente_buscar',compact('curso','docentes')); 

    }

    public function docente_guardar($id_curso,$id_docente){
        
          $curso = curso::find($id_curso);
          $curso['docente_id_docente'] = $id_docente;
          $curso->update();

          return view('curso.curso_docente_listar',compact('curso')); 
    }
}