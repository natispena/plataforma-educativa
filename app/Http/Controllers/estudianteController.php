<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\estudiante;
use App\Model\postulante;

use App\Model\institucion;
use App\Model\rol;
use App\Model\curso;
use App\User;
use Illuminate\Support\Facades\Hash;

class estudianteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $estudiantes = estudiante::all();
        $cursos = curso::all();
        return view('estudiante.estudiante_listar',compact('titulo','estudiantes','cursos')); 
    }

    public function editar($id_estudiante){
        $estudiante = estudiante::find($id_estudiante);
        return view('estudiante.estudiante_editar',compact('estudiante')); 
    }

    public function nuevo(){
        $instituciones = institucion::all();
        $cursos= curso::all();
        $roles=rol::all();
        return view('estudiante.estudiante_crear',compact("instituciones","cursos","roles"));
    }
    public function nuevo2($id){

        $postulantes= postulante::find($id);
        $instituciones = institucion::all();
        $cursos= curso::all();
        $roles=rol::all();
     return view('postulante.confirmacion',compact("postulantes","instituciones","cursos","roles"));
    }

    public function guardar(Request $request){
        
        estudiante::create([

            'documento' => $request['documento'],
            'nombre' => $request['nombre'],
            'nombre_padre' => $request['nombre_padre'],
            'nacimiento' => $request['nacimiento'],
            'direccion' =>$request['direccion'],
            'correo' =>$request['correo'],
            'telefono' =>$request['telefono'],
            'username' =>$request['username'],
            'contrasena' =>$request['contrasena'],
            'institucion_id_jardin'  =>$request['id_institucion'],
            'curso_id_curso' =>$request['id_curso'],
            'rol_id_rol' => 4
           
          ]);

          user::create([
            'name' => $request['nombre'],
            'email' => $request['correo'],
            'password' => Hash::make($request['contrasena'])
          ]);

          $titulo = 'Titulo';
          $estudiantes = estudiante::all();
  
          return view('estudiante.estudiante_listar',compact('titulo','estudiantes')); 
    }


    public function actualizar(Request $request,$id_estudiante){
        $estudiante = estudiante::find($id_estudiante);
        $estudiante['documento'] = $request['documento'];
        $estudiante['nombre']=$request['nombre'];
        $estudiante['nombre_padre'] =$request['nombre_padre'];
        $estudiante['nacimiento'] = $request['nacimiento'];
        $estudiante['direccion'] =$request['direccion'];
        $estudiante['correo'] =$request['correo'];
        $estudiante['telefono'] =$request['telefono'];
        $estudiante['username' ]=$request['username'];
        $estudiante['contrasena'] =$request['contrasena'];

        $estudiante->update();
        $titulo = 'Titulo';
          $estudiantes = estudiante::all();
  
          return view('estudiante.estudiante_listar',compact('titulo','estudiantes')); 
    }

    public function guardar2(Request $request){
        estudiante::create([

            'documento' => $request['documento'],
            'nombre' => $request['nombre'],
            'nombre_padre' => $request['nombre_padre'],
            'nacimiento' => $request['nacimiento'],
            'direccion' =>$request['direccion'],
            'correo' =>$request['correo'],
            'telefono' =>$request['telefono'],
            'username' =>$request['username'],
            'contrasena' =>$request['contrasena'],
            'institucion_id_jardin'  =>$request['id_institucion'],
            'curso_id_curso' =>$request['id_curso'],
            'rol_id_rol' => 4
           
          ]);

          user::create([
            'name' => $request['nombre'],
            'email' => $request['correo'],
            'password' => Hash::make($request['contrasena'])
          ]);

          $titulo = 'Titulo';
          $estudiantes = estudiante::all();
  
          return view('mensaje2',compact('titulo','estudiantes')); 
    }

}