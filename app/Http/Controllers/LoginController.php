<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Curl\Curl;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\usuario;
use App\Model\institucion;


class LoginController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function autenticar(Request $request){
        $usuario['username']= $request['email'];
        $usuario['password']= $request['password'];
        $url='http://localhost:58972/api/login/Token';
        $curl = new Curl();
        $curl->post($url, $usuario);
        $str=$curl->response;
        if(!$str){
            return view('Login.Login');
        }else{
            $titulo = 'Titulo';
            $curl->get('http://localhost:58972/api/institucion/Listar');
            $instituciones = $curl->response;
            $instituciones = json_decode(json_encode($instituciones), true);
            return view ('institucion.institucion_listar',compact('instituciones','titulo'));
        }
    }
}
