@extends('layouts.admin')

@section('titulo')

    <span> Pedidos </span>
    
    <a href="/pedidos/create" class="btn btn-primary btn-circle" >
        <i class="fas fa-plus"></i>
    </a>

    <a href="/pedido/pedidospdf" class="btn btn-danger btn-sm" data-placement="left">
        <i class="fas fa-file-pdf"></i>
    </a>

    <a href="/pedido/excel" class="btn btn-success btn-sm">
    <i class="fas fa-file-excel"></i></a>


@endsection 
    @section('contenido')
   
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
            <table id="dt-pedidos" class="table table-stripped table-bordered dts">
                    <thead>
                    
                        <tr>
                        
                            <th class="text-center">Acciones</th>
                            <th class="text-center">No. Pedido</th>
                            <th class="text-center">Fecha </th>
                           <!-- <th class="text-center">Empleado</th>        
                            <th class="text-center">Tipo Pago</th>
                            <th class="text-center">Cliente</th>     -->                
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($pedidos as $pedidos)
                        <tr>
                        <td>
                            
                        <!--<a href="{{url('/pedidos/'.$pedidos->id_pedido.'/show')}}"  >-->
                        <a href="{{route('pedidos.show',$pedidos->id)}}"  >

                        <i class="fas fa-eye"></i>
                                </a>

                            <!--    <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="">
                                    <i class="far fa-trash-alt"></i>
                                </a>-->
                            </td>
                                <td>{{$pedidos->id}}</td>
                                <td>{{\Carbon\Carbon::parse($pedidos->Fecha)->format('d M y h:i a')}}</td>                              
                               <!-- <td>{{$pedidos->id_empleado}}</td>
                                <td>{{$pedidos->id_tipo_de_pago}}</td>
                                <td>{{$pedidos->id_cliente}}</td>-->
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

   <!-- 
     <script>    

        function show(pedidos){
            $("#deleteInventariosFrm").attr('action',`/inventarios/${inventarios.id}`);
                
        } 
        </script>

     funcion editEstadoEnvio para pasar parametros y editar-->

   <!----
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
    -->
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar
     <script>    

function deleteinventarios(inventarios){
    $("#deleteInventariosFrm").attr('action',`/inventarios/${inventarios.id}`);
           
} 
</script>
-->
<!-- para validaciones
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



-->
@endpush