@extends('layouts.admin')

@section('titulo')

    <span>Usuarios</span>
    
  <!--  <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i> 
    </a>-->
    &nbsp;

    <a href="/usuario/userpdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>
    <a href="{{route('user.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>   
    </a>
@endsection
    @section('contenido')
    @include('Usuarios.create')

    @include('Usuarios.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Email</th>                                 
                            <th class="text-center"> Nombre</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $User)
                        <tr>
                            <td>
                                @can('user_create')
                                <a href="{{route('usuarios.edit', $User->id) }}"  >

                                    <i class="far fa-edit"></i>
                                </a>
                                @endcan
                                @can('permission_create')
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteUser({{$User}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                @endcan
                                @can('permission_create')
                                <a href="{{ route('usuarios.show', $User->id) }}" ><i class="fas fa-eye"></i></a>
                                @endcan
                            </td>
                            <td>{{$User->id}}</td>
                            <td>{{$User->email}}</td>
                            <td>{{$User->name}}</td>                            
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

        function editUser(User){
            $("#editUserFrm").attr('action',`/usuarios/${User.id}`);
            $("#editUserFrm #email").val(User.email);
            $("#editUserFrm #email").val(User.email);
            $("#editUserFrm #name").val(User.name);
            
        }    
    </script>

    <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deleteUser(User){
            $("#deleteUserFrm").attr('action',`/usuarios/${User.id}`);
                   
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
