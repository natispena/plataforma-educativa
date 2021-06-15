
@extends('layout')
@section('content')
<div class="container mt-10 justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-15 mt" >
                <div class="form_register">
                    <form action="/curso/guardar" method="POST" >                  
                    @csrf
                        <div class="header-center">AGREGAR CURSO</div>

                        <div class="card-body">
                            <div class="form-group">
                              <label for=""class="col-12 ">CODIGO</label>
                              <input type="number" class="form-control col-md-15" name="codigo" id="codigo"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" id="nombre"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CUPO</label>
                              <input type="text" class="form-control col-md-15" name="n_estudiantes" id="n_estudiantes"required>
                            </div>
                            <strong>DOCENTE :</strong>
                            <br>
                         <select name="id_docente" style="width:500px"required>
                         @foreach($docentes as $docente)
                            <option value="{{$docente['id_docente']}}">{{$docente["nombre"]}}</option> 
                         @endforeach
                         </select>
                         <div class="row form-group">
                                <button type="submit" class="btn-success col-md-9 offset-2">AGREGAR</button>
                            </div>
                        </div>
                           
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
