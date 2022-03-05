@extends('layouts.admin')

@section('titulo')

    <span>Ver Productos </span>
    <div>
    <a href="/productos" class="btn btn-success btn-circle" >
    <i class="fas fa-users"></i>
    </a>

    <a href="/historicopreciomenu" class="btn btn-success btn-circle" >
    <i class="fas fa-history"></i>
    </a>

   <a href="{{route('productos.excel') }}" class="btn btn-success btn-circle"><i class="fas fa-file-excel"></i></a>

    </div>



@endsection 
    @section('contenido')
    
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Empleados" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Precio</th>   
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $empleado)
                        <tr>
                        
                            <td>{{$empleado->id}}</td>
                                <td>{{$empleado->NombreProducto}}</td>                                
                                <td>{{$empleado->Descripcion}}</td>
                                <td>{{$empleado->Categoria}}</td>                                
                                <td>{{$empleado->Precio}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

   <!---->
    

<!-- para validaciones-->
@if(!$errors->isEmpty())
@if($errors->has('post'))
    <script>
        $(function () {
            $('#createMdl').modal('show');
        });
    </script>   
@else
<script>
        $(function () {
            $('#editMdl').modal('show');
        });
    </script>
@endif
@endif

@endpush