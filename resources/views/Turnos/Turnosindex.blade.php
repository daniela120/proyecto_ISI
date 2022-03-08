@extends('layouts.admin')

@section('titulo')

    <span>Turnos</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

    &nbsp;

    <a href="/turno/turnopdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>
    <a href="{{route('turnos.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i></a>


@endsection
    @section('contenido')
    @include('Turnos.create')
    @include('Turnos.edit')
    @include('Turnos.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-turnos" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Tipo de Turno</th> 
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Hora de Entrada</th>
                            <th class="text-center">Hora de Salida</th>                             
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($turnos as $turnos)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editturnos({{$turnos}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteturnos({{$turnos}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$turnos->id}}</td>
                            <td>{{$turnos->TipoTurno}}</td> 
                            <td>{{$turnos->Descripcion}}</td>
                            <td>{{$turnos->HoraEntrada}}</td>
                            <td>{{$turnos->HoraSalida}}</td>     
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
        function editturnos(turnos){
            $("#editturnosFrm").attr('action',`/turnos/${turnos.id}`);
            $("#editturnosFrm #TipoTurno").val(turnos.TipoTurno); 
            $("#editturnosFrm #Descripcion").val(turnos.Descripcion);
            $("#editturnosFrm #HoraEntrada").val(turnos.HoraEntrada);
            $("#editturnosFrm #HoraSalida").val(turnos.HoraSalida);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deleteturnos(turnos){
        $("#deleteturnosFrm").attr('action',`/turnos/${turnos.id}`);      
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