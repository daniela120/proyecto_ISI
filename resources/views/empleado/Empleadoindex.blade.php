@extends('layouts.admin')

@section('titulo')

    <span>Empleados </span>
    <div>
    @can('empleado_create')
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
    @endcan
    @can('cargohis_index')
    <a href="/cargoempleadohistorico" class="btn btn-success btn-circle" >
    <i class="fas fa-history"></i>
    </a>
    @endcan
    @can('empleado_show')
    <a href="/empleado/indexjoin" class="btn btn-success btn-circle" >
    <i class="fas fa-eye"></i>
    </a>
    @endcan
    @can('empleado_reporte')
    <a href="/empleados/empleadopdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>

    <a href="/empleados/excel" class="btn btn-success btn-sm">
        <i class="fas fa-file-excel"></i></a>
    @endcan
    </div>

    
   

@endsection 
    @section('contenido')
    @include('empleado.create')
    @include('empleado.edit')
    @include('empleado.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Empleados" class="table table-stripped table-bordered dts"  >
                    <thead>
                    <tr>
                            <th class="text-center"><font size=2>Acciones</th>
                            <th class="text-center"><font size=2>Id </th>
                            <th class="text-center"><font size=2>Nombre</th>
                            <th class="text-center"><font size=2>Apellido</th>
                            <th class="text-center"><font size=2>Fecha de Nacimiento</th>
                            <th class="text-center"><font size=2>Fecha de Contratación</th>
                            <th class="text-center"><font size=2>Dirección</th>
                            <th class="text-center"><font size=2>Cargo</th>
                            <th class="text-center"><font size=2> Teléfono</th>
                            <th class="text-center"><font size=2>Id Usuario</th>
                           <!-- <th class="text-center"><font size=2>Id Documento</th>-->
                            <th class="text-center"><font size=2>Id Turno</th>
                           <!-- <th class="text-center"><font size=2>Documento</th>-->
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($empleados as $empleado)
                        <tr>
                        <td>
                                @can('empleado_edit')
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editempleados({{$empleado}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                @endcan
                                @can('empleado_destroy')
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteEmpleado({{$empleado}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                @endcan
                            </td>
                               <td ><font size=1>{{$empleado->id}}</td>
                                <td><font size=1>{{$empleado->Nombre}}</td>
                                <td><font size=1>{{$empleado->Apellido}}</td>
                                <td><font size=1>{{$empleado->FechaNacimiento}}</td>
                                <td><font size=1>{{$empleado->FechaContratacion}}</td>
                                <td><font size=1>{{$empleado->Direccion}}</td>
                              <td><font size=1>{{$empleado->Id_Cargo}}</td>
                                <td><font size=1>{{$empleado->Telefono}}</td>
                                <td><font size=1>{{$empleado->Id_Usuario}}</td>
                              <!--  <td><font size=1>{{$empleado->Id_Documento}}</td>-->
                                <td><font size=1>{{$empleado->Id_Turno}}</td>
                              <!-- <td><font size=1>{{$empleado->Documento}}</td>-->
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    <!-- librerias 

    "{{ url('/empleado/.$empleado->id') }}"
{{ url('/empleado/.$empleado->id') }}
onclick="editempleados({{$empleados}})"-->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

   <!---->
    <script>    
        function editempleados(empleado){
            $("#editEmpleadoFrm").attr('action',`/empleado/${empleado.id}`);
            $("#editEmpleadoFrm #Nombre").val(empleado.Nombre);              
            $("#editEmpleadoFrm #Apellido").val(empleado.Apellido);    
            $("#editEmpleadoFrm #FechaNacimiento").val(empleado.FechaNacimiento);    
            $("#editEmpleadoFrm #FechaContratacion").val(empleado.FechaContratacion);    
            $("#editEmpleadoFrm #Direccion").val(empleado.Direccion);    
            $("#editEmpleadoFrm #Id_Cargo").val(empleado.Id_Cargo);    
            $("#editEmpleadoFrm #Telefono").val(empleado.Telefono);    
            $("#editEmpleadoFrm #Id_Usuario").val(empleado.Id_Usuario);    
            $("#editEmpleadoFrm #Id_Documento").val(empleado.Id_Documento);    
            $("#editEmpleadoFrm #Id_Turno").val(empleado.Id_Turno);    
            $("#editEmpleadoFrm #Documento").val(empleado.Documento);    
              
             

        } 
    </script>
   
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
     <script>    

function deleteEmpleado(empleado){
    $("#deleteEmpleadosFrm").attr('action',`/empleado/${empleado.id}`);
           
} 
</script>

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