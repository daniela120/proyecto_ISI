@extends('layouts.admin')

@section('titulo')

    <span>Salarios Histórico  </span>

    <a href="/cargoempleados" class="btn btn-primary btn-circle">
    <i class="fas fa-money-check-alt"></i>
        
    </a>

    
    
    

@endsection
    @section('contenido')
    
    <div class="card">
            <div class=card-body>
                <table id="dt-salarioshistorico" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            
                            <th class="text-center">Id </th>
                            <th class="text-center">Cargo</th>     
                            <th class="text-center">Salario</th>  
                            <th class="text-center">Fecha Inicio</th>                   
                            <th class="text-center">Fecha Final</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $salario)
                        <tr>
                           
                            <td>{{$salario->id}}</td>
                            <td>{{$salario->Cargo}}</td>
                            <td>{{$salario->Sueldo}}</td>
                            <td>{{$salario->FechaInicio}}</td>
                            <td>{{$salario->FechaFinal}}</td>
                            
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
    
    <!--DELETE -->
   
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
