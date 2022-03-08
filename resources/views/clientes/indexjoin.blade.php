@extends('layouts.admin')

@section('titulo')

    <span>Ver Cliente </span>
    <div>
    <a href="/clientes" class="btn btn-success btn-circle" >
    <i class="fas fa-users"></i>
    </a>

    <a href="{{route('clientes.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>

    </div>
   

@endsection 
    @section('contenido')
    
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Empleados" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        
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
                        
                        @foreach($probando as $cliente)
                        <tr>
                        
                            <td><font size=2>{{ $cliente->id }}</td>
                            <td><font size=2>{{ $cliente->Nombre }}</td>
                            <td><font size=2>{{ $cliente->Apellido }}</td>

                            <td><font size=2>{{ $cliente->name }}</td>

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