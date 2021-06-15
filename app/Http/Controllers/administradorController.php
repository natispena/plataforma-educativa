<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Model\administrador;

class administradorController extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listar(){
        $administradores = administrador::all();
    }

   
}