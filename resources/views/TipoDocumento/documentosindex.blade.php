@extends('layouts.admin')

@section('titulo')

    <span>Tipo de Documento</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection
    @section('contenido')
    @include('TipoDocumento.create')
    @include('TipoDocumento.edit')
    @include('TipoDocumento.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Tipo de Documento</th> 
                            <th class="text-center">Descripción</th>                             
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($tipodocumentos as $tipodocumentos)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="edittipodocumentos({{$tipodocumentos}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deletetipodocumentos({{$tipodocumentos}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$tipodocumentos->id}}</td>
                            <td>{{$tipodocumentos->TipoDocumento}}</td> 
                            <td>{{$tipodocumentos->Descripcion}}</td>        
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
        function edittipodocumentos(tipodocumentos){
            $("#editTipoDocumentoForm").attr('action',`/documentos/${tipodocumentos.id}`);
            $("#editTipoDocumentoForm #TipoDocumento").val(tipodocumentos.TipoDocumento); 
            $("#editTipoDocumentoForm #Descripcion").val(tipodocumentos.Descripcion);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deletetipodocumentos(tipodocumentos){
        $("#deleteTipoDocumentoFrm").attr('action',`/documentos/${tipodocumentos.id}`);      
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


