@extends('layouts.admin')

@section('titulo')

    <span>Productos</span>
    
    @can('producto_create')
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
    @endcan
    @can('preciohismenu_index')
    <a href="/historicopreciomenu" class="btn btn-primary btn-circle">
    <i class="fas fa-history"></i>
    </a>
    @endcan
    @can('producto_show')
    <a href="/productos/indexjoin" class="btn btn-primary btn-circle">
    <i class="fas fa-eye"></i>
    </a>
    @endcan
    &nbsp;
    @can('producto_reporte')
    <a href="/producto/productopdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>
    <a href="/producto/excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i>
    </a>
    @endcan


    

@endsection
    @section('contenido')
    @include('productos.create')
    @include('productos.edit')
    @include('productos.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre Producto</th>                      
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Precio</th>    
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($productos as $productos)
                        <tr>
                            <td>
                                @can('producto_edit')
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editPreoducto({{$productos}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                @endcan
                                @can('producto_destroy')
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteProducto({{$productos}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                @endcan
                            </td>
                            <td>{{$productos->id}}</td>
                            <td>{{$productos->NombreProducto}}</td>
                            <td>{{$productos->Descripcion}}</td>
                            <td>{{$productos->id_Categoria}}</td>
                            <td>{{$productos->Precio}}</td>
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

    <!-- funcion editProductos para pasar parametros y editar-->
    <script>    

        function editPreoducto(productos){
            $("#editProductosFrm").attr('action',`/productos/${productos.id}`);
            $("#editProductosFrm #NombreProducto").val(productos.NombreProducto);  
            $("#editProductosFrm #Descripcion").val(productos.Descripcion);     
            $("#editProductosFrm #id_Categoria").val(productos.id_Categoria);
            $("#editProductosFrm #Precio").val(productos.Precio);
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deleteProducto(productos){
            $("#deleteProductosFrm").attr('action',`/productos/${productos.id}`);
                   
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
