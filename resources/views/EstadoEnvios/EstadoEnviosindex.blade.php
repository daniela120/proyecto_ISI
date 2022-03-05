@extends('layouts.admin')

@section('titulo')

    <span>Estados de Envío </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

   &nbsp;

    <a href="{{ route('EstadoEnvios.pdf') }}'" class="btn btn-primary btn-sm" data-placement="left">
    {{ __('PDF') }}
    </a>

@endsection
    @section('contenido')
    @include('EstadoEnvios.create')
    @include('EstadoEnvios.edit')
    @include('EstadoEnvios.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-EstadoEnvios" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Nombre estado</th>                      
                                    
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Estadoenvios as $Estadoenvios)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editEstadoenvio({{$Estadoenvios}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteEstadoenvios({{$Estadoenvios}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$Estadoenvios->id}}</td>
                            <td>{{$Estadoenvios->Nombre_Estado}}</td>
                                    
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

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->
    <script>    

        function editEstadoenvio(Estadoenvios){
            $("#editEstadoenvioFrm").attr('action',`/estadoenvios/${Estadoenvios.id}`);
            $("#editEstadoenvioFrm #Nombre_Estado").val(Estadoenvios.Nombre_Estado);  
            
            
        } 
    </script>
    
     <!-- funcion deleteEstadoEnvio para pasar parametros y eliminar-->
     <script>    

function deleteEstadoenvios(Estadoenvios){
    $("#deleteEstadoEnvioFrm").attr('action',`/estadoenvios/${Estadoenvios.id}`);
           
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

