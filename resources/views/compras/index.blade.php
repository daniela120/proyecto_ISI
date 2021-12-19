@extends('layouts.admin')

@section('titulo')

    <span>Compras</span>
    
    <a href="/compras/create" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection
    @section('contenido')
    @include('Compras.create')
    @include('Compras.edit')
    @include('Compras.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id</th>
                            <th class="text-center">Fecha</th>                      
                            <th class="text-center">Hora Pedido</th>
                            <th class="text-center">Hora Recibido</th>
                            <th class="text-center">Id Proveedor</th>
                            <th class="text-center">Descripción compra</th>            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Compras as $Compras)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editCompras({{$Compras}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteCompras({{$Compras}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$Compras->id_compra}}</td>
                            <td>{{$Compras->Fecha}}</td>
                            <td>{{$Compras->HoraPedido}}</td>
                            <td>{{$Compras->HoraRecibido}}</td>
                            <td>{{$Compras->Id_Proveedor}}</td>
                            <td>{{$Compras->Descripcion}}</td>         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    <!-- librerias -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editCompras para pasar parametros y editar-->
    <!-----
    <script>    

        function editCompras(Compras){
            $("#editComprasFrm").attr('action',`/Compras/${Compras.id}`);
            $("#editComprasFrm #Fecha").val(Compras.Fecha);  
            $("#editComprasFrm #HoraPedido").val(Compras.HoraPedido); 
            $("#editComprasFrm #HoraRecibido").val(Compras.HoraRecibido); 
            $("#editComprasFrm #Id_Proveedor").val(Compras.Id_Proveedor);     
            $("#editComprasFrm #Descripcion").val(Compras.Descripcion);
            
        } 
    </script>
    -->
     <!-- funcion deleteCompras para pasar parametros y eliminar
    
    <script>    

        function deleteCompras(Compras){
            $("#deleteComprasFrm").attr('action',`/Compras/${Compras.id}`);
                   
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
