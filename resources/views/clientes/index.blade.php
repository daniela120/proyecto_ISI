@extends('layouts.admin')

@section('titulo')

    <span>Clientes</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    
    </a>
    <a href="/clientes/indexjoin" class="btn btn-success btn-circle" >
    <i class="fas fa-eye"></i>
    </a>

    <a href="{{ route('clientes/clientepdf') }}" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>
    <a href="{{route('clientes.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>


@endsection
    @section('contenido')
    @include('clientes.create')
    @include('clientes.edit')
    @include('clientes.delete')


    <div class="card">
            <div class=card-body>
                <table id="dt-cargoempleados" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center"><font size=2>Acciones</th>
                            <th class="text-center"><font size=2>Id </th>
                            <th class="text-center"><font size=2>Nombre</th>                      
                            <th class="text-center"><font size=2>Apellido</th>
                            <th class="text-center"><font size=2>Id_Usuario</th>   
                            <th class="text-center"><font size=2>Dirección</th>   
                            <th class="text-center"><font size=2>Teléfono</th>   
                            <th class="text-center"><font size=2>Fecha Nacimiento</th>       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($clientes as $cliente)
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
                            <td><font size=2>{{ $cliente->id }}</td>
                            <td><font size=2>{{ $cliente->Nombre }}</td>
                            <td><font size=2>{{ $cliente->Apellido }}</td>
                            <td><font size=2>{{ $cliente->Id_Usuario }}</td>
                            <td><font size=2>{{ $cliente->Direccion }}</td>
                            <td><font size=2>{{ $cliente->Telefono }}</td>
                            <td><font size=2>{{ $cliente->FechaNacimiento }}</td>      
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
           
        
    @endsection
<!--Librerias -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!--EDIT -->
    <script>    
        function editClientes(cliente){
            $("#editClientesFrm").attr('action',`/clientes/${cliente.id}`);
            $("#editClientesFrm #Nombre").val(cliente.Nombre); 
            $("#editClientesFrm #Apellido").val(cliente.Apellido); 
            $("#editClientesFrm #Id_Usuario").val(cliente.Id_Usuario);
            $("#editClientesFrm #Direccion").val(cliente.Direccion);
            $("#editClientesFrm #Telefono").val(cliente.Telefono);
            $("#editClientesFrm #FechaNacimiento").val(cliente.FechaNacimiento);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deleteClientes(cliente){
        $("#deleteClientesFrm").attr('action',`/clientes/${cliente.id}`);      
    } 
    </script>
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