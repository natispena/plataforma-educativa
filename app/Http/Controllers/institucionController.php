<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\institucion;
use App\Model\administrador;

class institucionController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $instituciones = institucion::all();

        return view('institucion.institucion_listar',compact('titulo','instituciones')); 
    }

    public function editar($id_jardin){
        $institucion=institucion::find($id_jardin);
        return view('institucion.institucion_editar', compact('institucion'));
    }
    public function nuevo(){
        $administradores = administrador::all();
        return view('institucion.institucion_crear', compact('administradores'));
    }

    public function guardar(Request $request){

        institucion::create([
            'nit_jardin' =>$request['nit_jardin'],
            'nombre_jardin' =>$request['nombre_jardin'],
            'direccion' =>$request['direccion'],
            'ciudad' =>$request['ciudad'],
            'telefono'=>$request['telefono'],
            'logo'=>$request['logo'],
            'administrador_id_admin'=>$request['id_admin']
        ]);
        $titulo='Titulo';
        $instituciones = institucion::all();
        return view('institucion.institucion_listar',compact('titulo','instituciones'));
    }
    public function actualizar(Request $request,$id_jardin){
        $institucion = institucion::find($id_jardin);
        $institucion['nit_jardin'] = $request['nit_jardin'];
        $institucion['nombre_jardin']=$request['nombre_jardin'];
        $institucion['direccion'] =$request['direccion'];
        $institucion['ciudad'] = $request['ciudad'];
        $institucion['telefono'] =$request['telefono'];
        $institucion['logo'] =$request['logo'];

        $institucion->update();
        $titulo = 'Titulo';
          $instituciones = institucion::all();
  
          return view('institucion.institucion_listar',compact('titulo','instituciones')); 
    
    }
}