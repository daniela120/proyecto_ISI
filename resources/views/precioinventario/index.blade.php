@extends('layouts.admin')

@section('titulo')

    <span> Precio Invetario </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection 
    @section('contenido')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-PrecioInventario" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Id_Inventario</th>
                            <th class="text-center">FechaInicio</th>
                            <th class="text-center">FechaFinal</th>
                            <th class="text-center">Precio</th>                        
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($precioinventario as $precioinventario)
                        <tr>
                            <td>{{$precioinventario->id}}</td>
                            <td>{{$precioinventario->id_inventario}}</td>
                            <td>{{$precioinventario->FechaInicio}}</td>
                            <td>{{$precioinventario->FechaFinal}}</td>
                            <td>{{$precioinventario->Precio}}</td>        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    @endsection
    <!-- librerias -->
    @push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
@endpush