@extends('layouts.admin')

@section('titulo')

    <span>Empleados </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection 
    @section('contenido')
    @include('empleado.create')
    @include('empleado.edit')
    @include('empleado.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Empleados" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Fecha de Nacimiento</th>
                            <th class="text-center">Fecha de Contratacion</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Id Cargo</th>
                            <th class="text-center"> Telefono</th>
                            <th class="text-center">Id Usuario</th>
                            <th class="text-center">Id Documento</th>
                            <th class="text-center">Id Turno</th>
                            <th class="text-center">Documento</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($empleados as $empleado)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                onclick="editempleados({{$empleados}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteEmpleado({{$empleados}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$empleado->id}}</td>
                                <td>{{$empleado->Nombre}}</td>
                                <td>{{$empleado->Apellido}}</td>
                                <td>{{$empleado->FechaNacimiento}}</td>
                                <td>{{$empleado->FechaContratacion}}</td>
                                <td>{{$empleado->Direccion}}</td>
                                <td>{{$empleado->Id_Cargo}}</td>
                                <td>{{$empleado->Telefono}}</td>
                                <td>{{$empleado->Id_Usuario}}</td>
                                <td>{{$empleado->Id_Documento}}</td>
                                <td>{{$empleado->Id_Turno}}</td>
                                <td>{{$empleado->Documento}}</td>
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    <!-- librerias -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

    <script>    
        function editempleados(empleados){
            $("#editEmpleadoFrm").attr('action',`/empleado/${empleados.id}`);
            $("#editEmpleadoFrm #Nombre").val(empleados.Nombre);              
            $("#editEmpleadoFrm #Apellido").val(empleados.Apellido);    
            $("#editEmpleadoFrm #FechaNacimiento").val(empleados.FechaNacimiento);    
            $("#editEmpleadoFrm #FechaContratacion").val(empleados.FechaContratacion);    
            $("#editEmpleadoFrm #Direccion").val(empleados.Direccion);    
            $("#editEmpleadoFrm #Id_Cargo").val(empleados.Id_Cargo);    
            $("#editEmpleadoFrm #Telefono").val(empleados.Telefono);    
            $("#editEmpleadoFrm #Id_Usuario").val(empleados.Id_Usuario);    
            $("#editEmpleadoFrm #Id_Documento").val(empleados.Id_Documento);    
            $("#editEmpleadoFrm #Id_Turno").val(empleados.Id_Turno);    
            $("#editEmpleadoFrm #Documento").val(empleados.Documento);    
              
             

        } 
    </script>
    
    
     <!-- funcion deleteEstadoEnvio para pasar parametros y eliminar-->
     <script>    

function deleteEmpleado(empleados){
    $("#deleteEmpleadoFrm").attr('action',`/empleado/${empleados.id}`);
           
} 
</script>
 
     <!-- para validaciones-->
     
@endpush