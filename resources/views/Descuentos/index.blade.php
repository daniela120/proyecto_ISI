@extends('layouts.admin')

@section('titulo')

    <span>Descuentos</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
    
    &nbsp;

    <a href="/descuento/descuentopdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>

    <a href="/descuento/excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>
    

@endsection
    @section('contenido')
    @include('Descuentos.create')
    @include('Descuentos.edit')
    @include('Descuentos.delete')

    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Valor Descuento</th> 
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Descuentos as $Descuentos)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editdescuento({{$Descuentos}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deletedescuento({{$Descuentos}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$Descuentos->id}}</td>
                            <td>{{$Descuentos->Descripcion}}</td> 
                            <td>{{$Descuentos->ValorDescuento}}</td>        
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
        function editdescuento(descuento){
            $("#editDescuentoForm").attr('action',`/descuentos/${descuento.id}`);
            $("#editDescuentoForm #Descripcion").val(descuento.Descripcion); 
            $("#editDescuentoForm #ValorDescuento").val(descuento.ValorDescuento);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deletedescuento(Descuentos){
        $("#deleteDescuentoFrm").attr('action',`/descuentos/${Descuentos.id}`);      
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


