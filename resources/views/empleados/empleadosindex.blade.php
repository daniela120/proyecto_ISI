@extends('layouts.admin')

@section('titulo')

    <span>Empleados</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    
    </a>

    

@endsection

    @section('contenido')
    <div class="card">
            <div class=card-body>
                    <table id="dt-empleado" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
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
                    
                </table>
            </div>

        </div>
           
        
    @endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
