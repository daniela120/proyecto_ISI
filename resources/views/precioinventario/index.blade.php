@extends('layouts.admin')

@section('titulo')

    <span> Histórico Precio Inventario </span>
    
   
        @can('inventario_index')
        <a href="/inventarios" class="btn btn-success btn-circle" >
             <i class="fas fa-boxes"></i>
        </a>
        @endcan
        @can('precioinventario_reporte')
        <a href="/precioinventarios/precioinventariopdf" class="btn btn-danger btn-sm" data-placement="left">
        <i class="fas fa-file-pdf"></i>
         </a>
         <a href="{{route('precioinventario.excel') }}" class="btn btn-success btn-sm">
        <i class="fas fa-file-excel"></i></a>
        @endcan
    
    
   

@endsection 
    @section('contenido')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-PrecioInventario" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                       
                            <th class="text-center">Id </th>
                            <th class="text-center">Inventario</th>
                            <th class="text-center">Precio</th> 
                            <th class="text-center">FechaInicio</th>
                            <th class="text-center">FechaFinal</th>
                                                   
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($probando as $precioinventario)
                        <tr>
                            <td>{{$precioinventario->id}}</td>
                            <td>{{$precioinventario->NombreInventario}}</td>
                            <td>{{$precioinventario->Precio}}</td>     
                            <td>{{$precioinventario->FechaInicio}}</td>
                            <td>{{$precioinventario->FechaFinal}}</td>
                               
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