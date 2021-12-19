extends('layouts.admin')

@section('titulo')

    <span> Role User </span>
    
   <!-- <a href="/pedidos/create" class="btn btn-primary btn-circle" >
        <i class="fas fa-plus"></i>
    </a>-->

@endsection 
    @section('contenido')
   
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
            <table id="dt-pedidos" class="table table-stripped table-bordered dts">
                    <thead>
                    
                        <tr>
                        
                            <th class="text-center">Id</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Role</th>
                                        
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($probando as $role_user)
                        <tr>
                        <td>{{$role_user->id}}</td>
                        <td>{{$role_user->nombreU}}</td>  
                        <td>{{$role_user->nombreR}}</td>   
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