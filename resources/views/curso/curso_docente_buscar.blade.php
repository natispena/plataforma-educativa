@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h2 mb-2 text-gray-800">COINCIDENCIAS</h1>

                            <h6 class="m-0 font-weight-bold text-primary">CURSO {{ $curso['numero']}}</h6>

                            <div class="card-body">
                                <label for=""class="h2 mb-2 text-gray-800">numero  {{ $curso['id_curso']}} </label>
                                  <label for=""class="col-12">NOMBRE {{ $curso['nombre']}} </label>
                                  <label for=""class="col-12">codigo {{ $curso['codigo']}}</label>
                            </div>

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de coincidencias</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        
                                        <div class="pull-right">
                                            <a class="btn btn-primary" href="{{ route('curso.docente', $curso['id_curso']) }}">Volver</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Documento</th>
                                                        <th>Nombre</th>
                                                        <th>Nacimiento</th> 
                                                        <th>Direccion</th> 
                                                        <th>Correo</th> 
                                                        <th>Tel</th>
                                                        <th>Username</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
    
                                                    @foreach($docentes as $docente )
                                                    <tr>
                                                        <td>{{ $docente["id_docente"]}} </td>
                                                        <td>{{ $docente["documento"]}} </td>
                                                        <td>{{ $docente["nombre"]}} </td>
                                                        <td>{{ $docente["direccion"]}} </td>
                                                        <td>{{ $docente["correo"]}} </td>
                                                        <td>{{ $docente["telefono"]}} </td>
                                                        <td>{{ $docente["username"]}} </td>
    
                                                    <td>
                                                         <a class="btn btn-info" href="{{ route('curso.docente.guardar',[$curso['id_curso'],$docente['id_docente']]) }}">Agregar</a>
                                                        {{-- <a href="/curso/estudiantes/guardar/{$estudiante['id_estudiante']}/{$curso['id_curso']}">Agregar</a> --}}
                                                     </td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <!-- /.container-fluid -->

                        <!-- FIN CONTENIDO -->
      
    @endsection