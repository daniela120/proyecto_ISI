@extends('layouts.admin')

@section('titulo')

    <span>Categorías</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
    &nbsp;
    <a href="/categoria/categoriapdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>

    <a href="/categoria/excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>


@endsection
    @section('contenido')
    @include('Categorias.create')
    @include('Categorias.edit')
    @include('Categorias.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Categoría</th>                      
                            <th class="text-center">Descripción</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Categorias as $Categorias)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editCategoria({{$Categorias}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteCategoria({{$Categorias}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$Categorias->id}}</td>
                            <td>{{$Categorias->Categoria}}</td>
                            <td>{{$Categorias->Descripcion}}</td>         
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

    <!-- funcion editCategoria para pasar parametros y editar-->
    <script>    

        function editCategoria(Categorias){
            $("#editCategoriaFrm").attr('action',`/categorias/${Categorias.id}`);
            $("#editCategoriaFrm #Categoria").val(Categorias.Categoria);  
            $("#editCategoriaFrm #Categoria").val(Categorias.Categoria);     
            $("#editCategoriaFrm #Descripcion").val(Categorias.Descripcion);
            
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deleteCategoria(Categorias){
            $("#deleteCategoriaFrm").attr('action',`/categorias/${Categorias.id}`);
                   
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
