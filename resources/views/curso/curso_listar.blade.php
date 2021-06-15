@extends('layout')
@section('content')
    
                          <!-- CONTENIDO -->    

                          <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h2 mb-2 text-gray-800">Listar Cursos</h1>
                           
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de Cursos</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        
                                        <div class="pull-right">
                                            <a class="btn btn-primary" href="{{ route('curso.nuevo') }}">Crear Curso</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Codigo</th>
                                                    <th>Cupo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cursos as $curso )
                                                <tr>
                                                    <td>{{ $curso["id_curso"]}} </td>
                                                    <td>{{ $curso["nombre"]}} </td>
                                                    <td>{{ $curso["codigo"]}} </td>
                                                    <td>{{ $curso["n_estudiantes"]}} </td>

                                                    <td>
                                                        <a class="btn btn-info" href="{{ route('curso.editar',$curso['id_curso']) }}">Editar</a>
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