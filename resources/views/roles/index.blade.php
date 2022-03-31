@extends('layouts.admin')

@section('titulo')

    <span>roles</span>
    @can('role_create')
    <a href="/roles/create" class="btn btn-primary btn-circle" >
        <i class="fas fa-plus"></i>
    </a>
    @endcan

@endsection
  @section('contenido')
    
  @include('roles.delete')
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
                            <th class="text-center">Permisos</th>  
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                @can('permission_create')
                                <a href="{{route('roles.edit', $role->id) }}" class="edit-form-data" >
                                    <i class="far fa-edit"></i>
                                </a>
                                @endcan
                                @can('permission_create')
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleterole({{$role}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                @endcan
                                @can('permission_create')
                                <a href="{{ route('roles.show', $role->id) }}" ><i class="fas fa-eye"></i></a>
                                @endcan
                            </td>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>  
                            <td>{{$role->guard_name}}</td>      
                            <td>
                            @forelse ($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @empty
                                <span class="badge badge-danger">No permission added</span>
                            @endforelse
                            </td>  
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

        function editrole(role){
            $("#editroleFrm").attr('action',`/roles/${role.id}`);
            $("#editroleFrm #name").val(role.name);    

            
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deleterole(role){
            $("#deleteroleFrm").attr('action',`/roles/${role.id}`);
                   
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
