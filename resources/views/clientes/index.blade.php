@extends('layouts.admin')


@section('titulo')

    <span>Clientes</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection}
    @section('contenido')
    @include('clientes.create')
    @include('clientes.edit')
    @include('clientes.delete')    

    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-cliente" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre</th>                      
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Usuario</th>   
                            <th class="text-center">Correo</th>   
                            <th class="text-center">Contraseña</th>  
                            <th class="text-center">Dirección</th>   
                            <th class="text-center">Teléfono</th>   
                            <th class="text-center">Fecha Nacimiento</th>      
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($cliente as $cliente)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editClientes({{$cliente}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteClientes({{$cliente}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->Nombre }}</td>
                            <td>{{ $cliente->Apellido }}</td>
                            <td>{{ $cliente->Usuario }}</td>
                            <td>{{ $cliente->Correo }}</td>
                            <td>{{ $cliente->Contraseña }}</td>
                            <td>{{ $cliente->Direccion }}</td>
                            <td>{{ $cliente->Telefono }}</td>
                            <td>{{ $cliente->FechaNacimiento }}</td>      
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


    <!-- funcion editCliente para pasar parametros y editar-->
    <script>    

        function editClientes(Clientes){
            $("#editClientesFrm").attr('action',`/clientes/${Clientes.id}`);
            $("#editClientesFrm #Nombre").val(Clientes.Nombre);     
            $("#editClientesFrm #Apellido").val(Clientes.Apellido);
            $("#editClientesFrm #Usuario").val(Clientes.Usuario);
            $("#editClientesFrm #Correo").val(Clientes.Correo);
            $("#editClientesFrm #Contraseña").val(Clientes.Contraseña);
            $("#editClientesFrm #Direccion").val(Clientes.Direccion);
            $("#editClientesFrm #Telefono").val(Clientes.Telefono);
            $("#editClientesFrm #FechaNacimiento").val(Clientes.FechaNacimiento);
            
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deleteClientes(Clientes){
            $("#deleteClientesFrm").attr('action',`/clientes/${Clientes.id}`);
                   
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





