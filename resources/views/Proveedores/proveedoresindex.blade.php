@extends('layouts.admin')

@section('titulo')

    <span>Proveedores</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

    &nbsp;

    <a href="{{ route('proveedores.pdf') }}'" class="btn btn-primary btn-sm" data-placement="left">
    {{ __('PDF') }}
    </a>
    <a href="{{route('proveedores.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>


@endsection
    @section('contenido')
    @include('Proveedores.create')
    @include('Proveedores.edit')
    @include('Proveedores.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre Compañia</th>                      
                            <th class="text-center">Nombre Contacto</th>  
                            <th class="text-center">Teléfono</th>  
                            <th class="text-center">Sitio Web</th>  
                            <th class="text-center">Dirección</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Proveedores as $Proveedores)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editProveedor({{$Proveedores}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deleteProveedor({{$Proveedores}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$Proveedores->id}}</td>
                            <td>{{$Proveedores->NombreCompania}}</td>
                            <td>{{$Proveedores->NombreContacto}}</td> 
                            <td>{{$Proveedores->Telefono}}</td> 
                            <td>{{$Proveedores->SitioWeb}}</td>   
                            <td>{{$Proveedores->Direccion}}</td>         
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

function editProveedor(Proveedores){
    $("#editProveedorFrm").attr('action',`/proveedores/${Proveedores.id}`);
    $("#editProveedorFrm #NombreCompania").val(Proveedores.NombreCompania);  
    $("#editProveedorFrm #NombreContacto").val(Proveedores.NombreContacto);     
    $("#editProveedorFrm #Telefono").val(Proveedores.Telefono);
    $("#editProveedorFrm #SitioWeb").val(Proveedores.SitioWeb);
    $("#editProveedorFrm #Direccion").val(Proveedores.Direccion);
    
} 
</script>

<!-- funcion deleteCategoria para pasar parametros y eliminar-->
<script>    

function deleteProveedor(Proveedores){
    $("#deleteProveedorFrm").attr('action',`/proveedores/${Proveedores.id}`);
           
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


