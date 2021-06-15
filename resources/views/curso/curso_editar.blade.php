
@extends('layout')
@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="{{ route('curso.actualizar',$curso['id_curso']) }}" method="POST" >                  
                    @csrf
                        <div class="header-center">AGREGAR CURSO</div>

                        <div class="card-body">
                            <div class="form-group">
                              <label for=""class="col-12 ">CODIGO</label>
                              <input type="number" class="form-control col-md-15" name="codigo" value="{{ $curso['codigo']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" value="{{ $curso['nombre']}}">
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CUPO</label>
                              <input type="text" class="form-control col-md-15" name="n_estudiantes" value="{{ $curso['n_estudiantes']}}">
                            </div>
                            
                            <strong>DOCENTE :</strong>
                            <br>
                         
                            <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">MODIFICAR</button>
                            </div>
                            
                        </div>
                           
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
