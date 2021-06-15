<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\postulante;

class postulanteController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $postulantes = postulante::all();

        return view('postulante.postulante_listar',compact('titulo','postulantes')); 
    }

    public function editar($id){
        $postulante = postulante::find($id);
        return view('postulante.postulante_editar',compact('postulante')); 
    }

    public function nuevo(){
        $postulantes=postulante::all();
        return view('postulante.postulante_crear',compact('postulantes'));
    }

    
    public function eliminar(Request $request, $id){
        $postulantes = postulante::find($id);
        $postulantes->delete();
        
        return view('estudiante.estudiante.listar',compact('postulantes')); 

    }
    public function guardar(Request $request){
        
        postulante::create([
            'documento' => $request['documento'],
            'nombre' => $request['nombre'],
            'nacimiento' =>$request['nacimiento'],
            'correo' =>$request['correo'],
            'telefono' => $request['telefono']
           
           
          ]);
          $titulo = 'Titulo';
          $postulantes = postulante::all();
  
          return view('mensaje',compact('titulo','postulantes')); 
    }

    public function actualizar(Request $request,$id){
        $postulante = postulante::find($id);
        $postulante['documento'] = $request['documento'];
        $postulante['nombre']=$request['nombre'];
        $postulante['nacimiento'] =$request['nacimiento'];
        $postulante['correo' ]=$request['correo'];
        $postulante['telefono'] =$request['telefono'];
        $postulante->update();
        $titulo = 'Titulo';
          $postulantes = postulante::all();
  
          return view('postulante.postulante_listar',compact('titulo','postulantes')); 
    }
}