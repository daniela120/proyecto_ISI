@extends('layouts.admin')

@section('titulo')

    <span>Ver Empleados </span>
    <div>
    <a href="/empleado" class="btn btn-success btn-circle" >
    <i class="fas fa-users"></i>
    </a>

    <a href="/cargoempleadohistorico" class="btn btn-success btn-circle" >
    <i class="fas fa-history"></i>
    </a>


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
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Fecha de Nacimiento</th>
                            <th class="text-center">Fecha de Contratación</th>                            
                            <th class="text-center">Cargo</th>
                            <th class="text-center"> Teléfono</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Turno</th>                                                     
                            <th class="text-center">Documento</th>
                            <th class="text-center">Tipo Doc</th>  
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $empleado)
                        <tr>
                        
                            <td>{{$empleado->id}}</td>
                                <td>{{$empleado->Nombre}}</td>
                                <td>{{$empleado->Apellido}}</td>
                                <td>{{$empleado->FechaNacimiento}}</td>
                                <td>{{$empleado->FechaContratacion}}</td>
                                
                                <td>{{$empleado->Cargo}}</td>
                                <td>{{$empleado->Telefono}}</td>
                                <td>{{$empleado->name}}</td>
                                <td>{{$empleado->TipoTurno}}</td>
                                                               
                                <td>{{$empleado->Documento}}</td>
                                <td>{{$empleado->TipoDocumento}}</td>
                                    
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