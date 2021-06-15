
@extends('layout')
@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="/curso/estudiantes/buscar" method="POST" >                  
                    @csrf
                        <div class="header-center">AGREGAR ESTUDIANTE AL CURSO</div>

                        <h6 class="m-0 font-weight-bold text-primary">CURSO {{ $curso['numero']}}</h6>

                            <div class="card-body">
                                <label for=""class="h2 mb-2 text-gray-800">numero  {{ $curso['id_curso']}} </label>
                                  <label for=""class="col-12">NOMBRE {{ $curso['nombre']}} </label>
                                  <label for=""class="col-12">codigo {{ $curso['codigo']}}</label>
                            </div>

                        <div class="card-body">
                            <div class="form-group">
                              <label for=""class="col-12 ">IDENTIFICACIÓN ESTUDIANTE</label>
                              <input type="number" class="form-control col-md-15" name="identificacion" id="identificacion">
                              <input type="hidden" class="form-control col-md-15" name="idcurso"  value="{{ $curso->id_curso }}">
                        
                            </div>
                        </div>
                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">BUSCAR</button>
                            </div>
                        </div>
                           
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
