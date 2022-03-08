@extends('layouts.admin')

@section('titulo')

    <span>Cargo Empleados</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    
    </a>

    <a href="/salario" class="btn btn-primary btn-circle">
    <i class="fas fa-users"></i>
        
    </a>

    &nbsp;
    <a href="/cargoempleado/cargopdf" class="btn btn-danger btn-sm" data-placement="left">
    <i class="fas fa-file-pdf"></i>
    </a>

@endsection
    @section('contenido')
    @include('cargoempleados.create')
    @include('cargoempleados.edit')
    @include('cargoempleados.delete')
    <div class="card">
            <div class=card-body>
                <table id="dt-cargoempleados" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Cargo</th>        
                            <th class="text-center">Salario</th>               
                                    
                            <th class="text-center">Descripción</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($cargoempleados as $cargoempleados)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editcargoempleados({{$cargoempleados}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                 onclick="deletecargoempleados({{$cargoempleados}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$cargoempleados->id}}</td>
                            <td>{{$cargoempleados->Cargo}}</td>
                            <td>{{$cargoempleados->Salario}}</td>
                            <td>{{$cargoempleados->Descripcion}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
           
        
    @endsection
<!--Librerias -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!--EDIT -->
    <script>    
        function editcargoempleados(Cargoempleados){
            $("#editCargoempleadoFrm").attr('action',`/cargoempleados/${Cargoempleados.id}`);
            $("#editCargoempleadoFrm #Cargo").val(Cargoempleados.Cargo); 
            $("#editCargoempleadoFrm #Salario").val(Cargoempleados.Salario); 
            $("#editCargoempleadoFrm #Descripcion").val(Cargoempleados.Descripcion);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deletecargoempleados(Cargoempleados){
        $("#deleteCargoempleadoFrm").attr('action',`/cargoempleados/${Cargoempleados.id}`);      
    } 
    </script>
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