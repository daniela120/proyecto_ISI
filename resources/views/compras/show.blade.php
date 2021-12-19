@extends('layouts.admin')

@section('titulo')

    <span> Detalles Compra </span>
@endsection 

@section('contenido')
          


             
<div class="card">
            <div class=card-body>
                <div class="row">


               
                <div class="col-lg-3 form-group">
                            <div>
                                <label for="fecha" class="form-fields">Fecha</label>
                                <p>{{\Carbon\Carbon::parse($compras->Fecha)->format('d M y h:i a')}}</p> 
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="HoraPedido" class="form-fields"> HoraPedido</label>
                                <p>{{$compras->HoraPedido}}</p> 
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="HoraRecibido" class="form-fields"> Hora Recibido</label>
                                <p>{{$compras->HoraRecibido}}</p> 
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="id_Proveedor" class="form-fields"> Proveedor</label>
                                <p>{{$compras->NombreP}}</p> 
                            </div>
                    </div>
                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="" class="form-fields"> Proveedor</label>
                                <p>{{$compras->NombreP}}</p> 
                            </div>
                    </div>
                </div>
        
    <div class="row">
         

            <div class="col-lg-12 form-group">
                    <table id="detalles" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                 <tr>
                                          
                                        <th class="text-center">Producto </th>
                                        <th class="text-center">Precio Unitario</th>
                                        <th class="text-center">Cantidad </th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">ISV</th>
                                        <th class="text-center">Importe</th>
                                                            
                                    </tr>
                                    
                                </thead>
                               
                                

                                
                                <tbody >
                                @foreach($detallepedidos as $detallepedidos)
                                  
                                <tr>
                                        
                                        <td>{{$detallepedidos->NombreProducto}}</td>
                                        <td>{{$detallepedidos->Precio}}</td>
                                        <td>{{$detallepedidos->Cantidad}}</td>
                                        <td>{{$detallepedidos->ValorDescuento}}</td>
                                        <td>{{$detallepedidos->isv}}</td>
                                        <td>{{$detallepedidos->Cantidad*$detallepedidos->Precio-$detallepedidos->ValorDescuento}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="col-lg-4 form-group " id="bt_guardar"> 
                        
                        <a class="btn btn-secondary mr-1" href="{{url('/compras') }}">Regresar</a>
                    </div>


                </div>
            </div>
                </div>



            
</div>





@endsection