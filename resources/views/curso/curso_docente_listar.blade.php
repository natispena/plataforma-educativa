@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h2 mb-2 text-gray-800">Listar docente por curso</h1>

                            <h2 class="m-0 font-weight-bold text-primary">CURSO {{ $curso['numero']}}</h2>

                            <div class="card-body">
                                <label for=""class="h2 mb-2 text-gray-800">numero  {{ $curso['id_curso']}} </label>
                                  <label for=""class="col-12">NOMBRE {{ $curso['nombre']}} </label>
                                  <label for=""class="col-12">codigo {{ $curso['codigo']}}</label>
                            </div>

                            <h2 class="m-0 font-weight-bold text-primary">Docente a cargo</h2>

                            <div class="card-body">
                                <label for=""class="h2 mb-2 text-gray-800">ID  {{ $curso->docente->id_docente}} </label>
                                  <label for=""class="col-12">NOMBRE {{ $curso->docente->nombre}} </label>
                                  <label for=""class="col-12">DOCUMENTO {{ $curso->docente->documento}}</label>
                                  <label for=""class="col-12">CORREO {{ $curso->docente->correo}}</label>
                            </div>
                            <form action="/curso/docente/buscar" method="POST" >                  
                                @csrf
                                    <div class="header-center">MODIFICAR DOCENTE SIGNADO</div>
            
                                  
            
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label for=""class="col-12 ">IDENTIFICACIÓN DOCENTE</label>
                                          <input type="number" class="form-control col-md-15" name="identificacion" id="identificacion">
                                          <input type="hidden" class="form-control col-md-15" name="idcurso"  value="{{ $curso->id_curso }}">
                                    
                                        </div>
                                    </div>
                                     <div class="row form-group">
                                            <button type="submit" class="btn-success col-md-9 offset-2">BUSCAR</button>
                                        </div>
                                    </div>
                                       
                                </form>
      
    @endsection