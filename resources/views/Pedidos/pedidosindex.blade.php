@extends('layouts.admin')

@section('titulo')

    <span>Pedidos </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection 
    @section('contenido')
    
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-pedidos" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        <th class="text-center">Acciones</th>
                            <th class="text-center">Id </th>
                            <th class="text-center">Empleado</th>
                            <th class="text-center">Fecha de Nacimiento</th>
                            <th class="text-center">Tipo Pago</th>
                            <th class="text-center">Cliente</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($pedidos as $pedidos)
                        <tr>
                        <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$pedidos->id_pedido}}</td>
                                <td>{{$pedidos->id_empleado}}</td>
                                <td>{{$pedidos->Fecha}}</td>
                                <td>{{$pedidos->id_tipo_de_pago}}</td>
                                <td>{{$pedidos->id_cliente}}</td>
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

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

   <!---->
    <script>    
        
             

        } 
    </script>
   
    
     <!-- funcion deleteCategoria para pasar parametros y eliminar-->
     <script>    


           
} 
</script>