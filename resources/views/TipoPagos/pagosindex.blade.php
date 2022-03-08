@extends('layouts.admin')

@section('titulo')

    <span>Tipo de Pagos</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

    &nbsp;

    <a href="{{ route('pagos.pdf') }}" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>

    <a href="{{route('tiposdepago.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>


@endsection
    @section('contenido')
    @include('TipoPagos.create')
    @include('TipoPagos.edit')
    @include('TipoPagos.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Tipo de Pago</th>                             
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($tiposdepago as $tiposdepago)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editPago({{$tiposdepago}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deletePago({{$tiposdepago}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$tiposdepago->id}}</td>
                            <td>{{$tiposdepago->Nombre_Tipo_Pago}}</td>        
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

        function editPago(tiposdepago){
            $("#editPagoFrm").attr('action',`/pagos/${tiposdepago.id}`);
            $("#editPagoFrm #Nombre_Tipo_Pago").val(tiposdepago.Nombre_Tipo_Pago);  
            
        } 
    </script>
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
    <script>    

        function deletePago(tiposdepago){
            $("#deletePagoFrm").attr('action',`/pagos/${tiposdepago.id}`);
            $("deletetPagoFrm #Nombre_Tipo_Pago").val(tiposdepago.Nombre_Tipo_Pago);
                   
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
