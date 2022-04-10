@extends('layouts.admin')

@section('titulo')

    <span>Permisos</span>
    @can('permission_create')
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
    @endcan

@endsection
  @section('contenido')
    @include('permissions.create')
    @include('permissions.edit')
    @include('permissions.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">name</th>                      
                            <th class="text-center">guard_name</th>  
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                @can('permission_edit')
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editpermission({{$permission}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                @endcan
                                @can('permission_destroy')
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deletepermission({{$permission}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                @endcan
                            </td>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>  
                            <td>{{$permission->guard_name}}</td>        
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

        function editpermission(permission){
            $("#editpermissionFrm").attr('action',`/permissions/${permission.id}`);
            $("#editpermissionFrm #name").val(permission.name);    

            
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deletepermission(permission){
            $("#deletepermissionFrm").attr('action',`/permissions/${permission.id}`);
                   
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
