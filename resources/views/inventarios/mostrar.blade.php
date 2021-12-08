@extends('layouts.admin')

@section('titulo')

    <span> Inventario </span>
    


    <a href="/inventarios" class="btn btn-success btn-circle" >
             <i class="fas fa-boxes"></i>
        </a>

    <a href="/precioinventario" class="btn btn-success btn-circle" >
    <i class="fas fa-history"></i>
    </a>

@endsection 
    @section('contenido')
   
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Inventarios" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre Inventario</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Precio Unitario</th>
                            <th class="text-center">Cantidad Stock</th>
                            <th class="text-center">Stock Actual</th>
                            <th class="text-center">Stock Min</th>
                            <th class="text-center">Stock Max</th>
                            <th class="text-center">Proveedor</th>
                            <th class="text-center">Descontinuado</th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    
                    @foreach($probando as $inventario)
                        <tr>
                        

                                <td>{{$inventario->id}}</td>
                                <td>{{$inventario->NombreInventario}}</td>
                                <td>{{$inventario->Categoria}}</td>
                                <td>{{$inventario->PrecioUnitario}}</td>
                                <td>{{$inventario->CantidadStock}}</td>
                                <td>{{$inventario->StockActual}}</td>
                                <td>{{$inventario->StockMin}}</td>
                                <td>{{$inventario->StockMax}}</td>
                                <td>{{$inventario->NombreCompañia}}</td>
                                <td>{{$inventario->Descontinuado}}</td>
                               
                                    
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    <!-- librerias 

    -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

   <!---->
    
   
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
     

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