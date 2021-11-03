@extends('layouts.admin')

@section('titulo')

    <span>Usuarios</span>
    
    <a href="/register" class="btn btn-primary btn-circle" data-toggle="" data-target="">
        <i class="fas fa-plus"></i>
    
    </a>

    

@endsection



    

    @section('contenido')
    @include('Usuarios.create')
    @include('Usuarios.edit')
    @include('Usuarios.delete')
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Id </th>
                            <th class="text-center">Email</th>  
                           <!-- <th class="text-center">Contraseña</th>    -->                                               
                            <th class="text-center"> Nombre</th>
                            <th class="text-center">Acciones</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Users as $User)
                        <tr>
                            <td>{{$User->id}}</td>
                            <td>{{$User->email}}</td>
                           <!-- <td>{{$User->password}}</td>-->
                            <td>{{$User->name}}</td>
                            <td><a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                            onclick="editUser({{$User}})">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ url('/usuarios/'.$User->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-primary" onclick="return confirm('Desea Borrar el Registro?')"
                                value="eliminar">
                                
                            </a>
                                
                        </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
           
        
    @endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        

        function editUser(User){
            $("#editUserFrm").attr('action',`/usuarios/${User.id}`);
            $("#editUserFrm #email").val(User.email);
            $("#editUserFrm #password").val(User.password);
            $("#editUserFrm #name").val(User.name);
            
        }

        
    </script>

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function () {
                    $('#editeMdl').modal('show');
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
