<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Hash;
use App\Model\docente;
use App\Model\institucion;
use App\User;

class docenteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $docentes = docente::all();

        return view('docente.docente_listar',compact('titulo','docentes')); 
    }

    public function editar($id_docente){
        $docente = docente::find($id_docente);
        return view('docente.docente_editar',compact('docente')); 
    }

    public function nuevo(){
        $instituciones = Institucion::all();
        return view('docente.docente_crear',compact("instituciones"));
    }

    public function guardar(Request $request){
        
        docente::create([

            'documento' => $request['documento'],
            'nombre' => $request['nombre'],
            'correo' => $request['correo'],
            'telefono' => $request['telefono'],
            'direccion' =>$request['direccion'],
            'ciudad' =>$request['ciudad'],
            'username' =>$request['username'],
            'contrasena' =>$request['contrasena'],
            'institucion_id_jardin'  => $request['id_institucion'],
            'rol_id_rol'=> 3
           
          ]);

          user::create([
            'name' => $request['nombre'],
            'email' => $request['correo'],
            'password' => Hash::make($request['contrasena'])
          ]);

          $titulo = 'Titulo';
          $docentes = docente::all();
  
          return view('docente.docente_listar',compact('titulo','docentes')); 
    }

    public function actualizar(Request $request,$id_docente){
        $docente = docente::find($id_docente);
        $docente['documento'] = $request['documento'];
        $docente['nombre']=$request['nombre'];
        $docente['correo'] =$request['correo'];
        $docente['ciudad'] =$request['ciudad'];         
        $docente['username' ]=$request['username'];
        $docente['contrasena'] =$request['contrasena'];

        $docente->update();
        $titulo = 'Titulo';
          $docentes = docente::all();
  
          return view('docente.docente_listar',compact('titulo','docentes')); 
    }
}