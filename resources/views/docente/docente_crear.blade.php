@extends('layout')

@section('content')
  
<div class="row">
  <div class="col-md-10 col-md-offset-1">
                  <form action="/docente/guardar" method="POST">
                    @csrf
                          
                        <div class="header-center">AGREGAR DOCENTE</div>

                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-6">

                            <div class="form-group">
                              <label for=""class="col-12 ">DOCUMENTO</label>
                              <input type="number" class="form-control col-md-15" name="documento" placeholder="Ingrese documento"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">NOMBRE </label>
                              <input type="text" class="form-control col-md-15" name="nombre" placeholder="digite el nombre"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CORREO</label>
                              <input type="text" class="form-control col-md-15" name="correo" placeholder="ingrese su correo"required>
                            </div>

                            <div class="form-group">
                              <label for=""class="col-12">TELEFONO</label>
                              <input type="text" class="form-control col-md-15" name="telefono" placeholder="ingrese su numero"required>
                            </div>
                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="0" id="aceptaTerminos" required>
                              <label class="form-check-label" for="defaultCheck1">
                                Acepta términos y condiciones de la resolución número 307 de 2008.
                              </label>
                            </div>
                            
                            <a href="https://www.ucundinamarca.edu.co/index.php/proteccion-de-datos-personales" class="text-info" target="_blank">- Ver la Resolución No. 050 de 2018 , tratamiento de datos personales</a>
                            

                          </div>
                          <div class="col-md-6">

                            <div class="form-group">
                              <label for=""class="col-12">DIRECCION</label>
                              <input type="text" class="form-control col-md-15" name="direccion" placeholder="ingrese su direccion"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CIUDAD</label>
                              <input type="text" class="form-control col-md-15" name="ciudad" placeholder="ingrese su ciudad"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">USERNAME </label>
                              <input type="text" class="form-control col-md-15" name="username" placeholder="ingrese su nombre de usuario"required>
                            </div>
                            <div class="form-group">
                              <label for=""class="col-12">CONTRASEÑA </label>
                              <input type="password" class="form-control col-md-15" name="contrasena" placeholder="ingrese su contraseña"required>
                            </div>
                            <strong>INSTITUCION A LA QUE PERTENECE:</strong>
                            <br>
                         <select name="id_institucion" class="form-control form-control-lg"required>
                         
                         @foreach($instituciones as $institucion)
                            <option value="{{$institucion['id_jardin']}}">{{$institucion["nombre_jardin"]}}</option> 
                         @endforeach
                         </select>
                         
                        </div>

                          <div class="form-actions" style="padding-left: 45%">
                            <br>
                                  <button type="submit" class="btn-success btn-lg btn-block">AGREGAR</button>
                          </div>

                        </div> 
                      </div>
                    </form>
                </div>
            </div>

    @endsection