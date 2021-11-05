@extends('layouts.admin')

@section('titulo')

    <span>Productos</span>
    
    <a href="/register" class="btn btn-primary btn-circle" data-toggle="" data-target="">
        <i class="fas fa-plus"></i>
    
    </a>

    

@endsection



    

    @section('contenido')
    @include('productos.create')
    @include('productos.edit')
    @include('productos.delete')
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Id </th>
                                                                         
                            <th class="text-center"> Nombre</th>
                            <th class="text-center">Descripcion</th>  
                            <th class="text-center">Categoria</th>  
                            <th class="text-center">Acciones</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            
                            
                        </tr>
                       
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
