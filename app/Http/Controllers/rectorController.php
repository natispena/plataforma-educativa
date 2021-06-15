<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\institucion;
use App\Model\rector;

class rectorController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $titulo = 'Titulo';
        $rectores = rector::all();

        return view('rector.rector_listar',compact('titulo','rectores')); 
    }

    public function editar($id_rector){
        $rector = rector::find($id_rector);
        return view('rector.rector_editar',compact('rector')); 
    }

    public function nuevo(){
        $instituciones=institucion::all();
        return view('rector.rector_crear',compact('instituciones'));
    }

    public function guardar(Request $request){
        
        rector::create([
            'documento_rector' => $request['documento_rector'],
            'nombre_rector' => $request['nombre'],
            
            'telefono' => $request['telefono'],
            'username' =>$request['username'],
            'contrasena' =>$request['contrasena'],
            'institucion_id_jardin'  => $request['id_institucion'],
            'rol_id_rol'=> 2
           
          ]);
          $titulo = 'Titulo';
          $rectores = rector::all();
  
          return view('rector.rector_listar',compact('titulo','rectores')); 
    }

    public function actualizar(Request $request,$id_rector){
        $rector = rector::find($id_rector);
        $rector['documento_rector'] = $request['documento_rector'];
        $rector['nombre_rector']=$request['nombre'];
        
        $rector['telefono'] =$request['telefono'];
        $rector['username' ]=$request['username'];
        $rector['contrasena'] =$request['contrasena'];

        $rector->update();
        $titulo = 'Titulo';
          $rectores = rector::all();
  
          return view('rector.rector_listar',compact('titulo','rectores')); 
    }
}