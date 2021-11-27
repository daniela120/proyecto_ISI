@extends('layouts.admin')

@section('titulo')

    <span> Inventario </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection 
    @section('contenido')
    @include('inventarios.create')
    @include('inventarios.edit')
    @include('inventarios.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Inventarios" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre Inventario</th>
                            <th class="text-center">Id Categoría</th>
                            <th class="text-center">Precio Unitario</th>
                            <th class="text-center">Cantidad Stock</th>
                            <th class="text-center">Stock Actual</th>
                            <th class="text-center">Stock Min</th>
                            <th class="text-center">Stock Max</th>
                            <th class="text-center"> Id Proveedor</th>
                            <th class="text-center">Descontinuado</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($inventarios as $inventarios)
                        <tr>
                        <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editinventarios({{$inventarios}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteinventarios({{$inventarios}})" >
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                                <td>{{$inventarios->id}}</td>
                                <td>{{$inventarios->NombreInventario}}</td>
                                <td>{{$inventarios->Id_Categoria}}</td>
                                <td>{{$inventarios->PrecioUnitario}}</td>
                                <td>{{$inventarios->CantidadStock}}</td>
                                <td>{{$inventarios->StockActual}}</td>
                                <td>{{$inventarios->StockMin}}</td>
                                <td>{{$inventarios->StockMax}}</td>
                                <td>{{$inventarios->Id_Proveedor}}</td>
                                <td>{{$inventarios->Descontinuado}}</td>
                                    
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
    <script>    
        function editinventarios(inventarios){
            $("#editInventariosFrm").attr('action',`/inventarios/${inventarios.id}`);
            $("#editInventariosFrm #NombreInventario").val(inventarios.NombreInventario);              
            $("#editInventariosFrm #Id_Categoria").val(inventarios.Id_Categoria);  
            $("#editInventariosFrm #PrecioUnitario").val(inventarios.PrecioUnitario);   
            $("#editInventariosFrm #CantidadStock").val(inventarios.CantidadStock);    
            $("#editInventariosFrm #StockActual").val(inventarios.StockActual);    
            $("#editInventariosFrm #StockMin").val(inventarios.StockMin);    
            $("#editInventariosFrm #StockMax").val(inventarios.StockMax);    
            $("#editInventariosFrm #Id_Proveedor").val(inventarios.Id_Proveedor);    
            $("#editInventariosFrm #Descontinuado").val(inventarios.Descontinuado);   
              
             

        } 
    </script>
   
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
     <script>    

function deleteinventarios(inventarios){
    $("#deleteInventariosFrm").attr('action',`/inventarios/${inventarios.id}`);
           
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