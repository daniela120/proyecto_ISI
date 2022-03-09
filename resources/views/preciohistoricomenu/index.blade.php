@extends('layouts.admin')

@section('titulo')

    <span>Histórico Precio Menú </span>

    <a href="/productos" class="btn btn-primary btn-circle">
    <i class="fas fa-utensils"></i>
        
    </a>

    <a href="/preciohistoricomenus/preciohismenupdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>
    <a href="{{route('historicopreciomenu.excel') }}" class="btn btn-success btn-sm">
    <i class="fas fa-file-excel"></i></a>

    
    
    

@endsection
    @section('contenido')
    
    <div class="card">
            <div class=card-body>
                <table id="dt-preciomenuhistorico" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            
                            <th class="text-center">Id </th>
                            <th class="text-center">Producto</th>     
                            <th class="text-center">Precio</th>  
                            <th class="text-center">Fecha Inicio</th>                   
                            <th class="text-center">Fecha Final</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $preciomenu)
                        <tr>
                           
                            <td>{{$preciomenu->id}}</td>
                            <td>{{$preciomenu->NombreProducto}}</td>
                            <td>{{$preciomenu->Precio}}</td>
                            <td>{{$preciomenu->FechaInicio}}</td>
                            <td>{{$preciomenu->FechaFinal}}</td>
                            
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
    
    <!--DELETE -->
   
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
