<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\docente;
use App\Model\tema;
use App\Model\foro;
use App\Model\foro_comentario;
use App\Model\foro_respuesta;

class foroController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){

        $foros = foro::all();
        return view('foro.foro_listar',compact('foros')); 
    }

    public function editar($idforo){
        $foro = foro::find($idforo);
        return view('foro.foro_editar',compact('foro')); 
    }

    public function actualizar(Request $request,$idforo){
        $foro = foro::find($idforo);
        $foro['nombre'] = $request['nombre'];
        $foro['contenido']=$request['contenido'];
       

        $foro->update();
       
        $foros = foro::all();
  
          return view('foro.foro_listar',compact('foros')); 
    }


    public function nuevo(){
        $docentes = docente::all();
        $temas = tema::all();
  
        return view('foro.foro_crear',compact('docentes','temas'));
    }

    public function guardar(Request $request){
        
        foro::create([

            'nombre' => $request['nombre'],
            'contenido' => $request['contenido'],
            'docente_iddocente' => $request['id_docente'],
            'tema_idtema' =>$request['idtema']
           
          ]);
          $foros = foro::all();
  
          return view('foro.foro_listar',compact('foros')); 
    }

    // COMENTARIOS

    public function comentario($idforo){
        $foro = foro::find($idforo);
        return view('foro.foro_comentario',compact('foro'));
    }
    public function nuevocomentario($idforo){
        
        return view('foro.nuevo_comentario',compact('idforo'));
    }
    
    public function guardar_comentario(Request $request){
        
        foro_comentario::create([

            'comentario' => $request['comentario'],
            'fecha_creacion' => date("Y-m-d H:i:s"),
            'foro_idforo' => $request['idforo'],
            'estudiante_idestudiante' => 1
           
          ]);
          
        $foro = foro::find($request['idforo']);
        return view('foro.foro_comentario',compact('foro')); 
    }

    //RESPUESTA

    public function guardar_respuesta(Request $request){
        
        foro_respuesta::create([   

            'respuesta' => $request['respuesta'],
            'fecha_creacion' => date("Y-m-d H:i:s"),
            'comentario_idcomentario'=> $request['idcomentario'],
            'estudiante_idestudiante'=> 1
           
          ]);
          
          return redirect()->route('foro.comentarios', $request['idforo']);
    }

    public function eliminar_respuesta($idrespuesta){
        
        $respuesta = foro_respuesta::find($idrespuesta);
        $comentario = foro_comentario::find($respuesta->comentario_idcomentario);
        $foro = foro::find($comentario->foro_idforo);

        $delete = foro_respuesta::destroy($idrespuesta);
          
          return redirect()->route('foro.comentarios', $foro->idforo);
    }
}