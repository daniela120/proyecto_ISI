@extends('layouts.admin')

@section('titulo')

    <span>Categorias</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    
    </a>

@endsection
    @section('contenido')
    @include('Categorias.create')
    @include('Categorias.edit')
    @include('Categorias.delete')
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Categoria</th>                      
                            <th class="text-center">Descripcion</th>        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($Categorias as $Categorias)
                        <tr>
                            <td><a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                onclick="">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{}" method="post"  class="d-inline">
                                    
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Desea Borrar el Registro?')" value="Eliminar">             
                                </a>
                            </td>
                            <td>{{$Categorias->id}}</td>
                            <td>{{$Categorias->Categoria}}</td>
                            <td>{{$Categorias->Descripcion}}</td>
                            
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

    

    
@endpush
