@extends('layouts.admin')

@section('titulo')

    <span> Nueva compra </span>
@endsection 

@section('contenido')
            
<form action="{{ url('/compras') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class=card-body>
                <div class="row">
                   
                    <div class="col-lg-4 form-group">
                        <div>
                            <label for="Fecha" class="form-fields"> Fecha </label>
                            <input type="date" class="form-control {{$errors->has('Fecha') ? 'is-invalid' : '' }}" name="Fecha" id="Fecha" 
                            value="" placeholder=''>
                            @if($errors->has('Fecha'))
                                <span class="text-danger">{{$errors->first('Fecha')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 form-group">
                        <div>
                            <label for="HoraPedido" class="form-fields"> Hora Pedido </label>
                            <input type="Time" class="form-control {{$errors->has('HoraPedido') ? 'is-invalid' : '' }}" name="HoraPedido" id="HoraPedido" 
                            value="" placeholder=''>
                            @if($errors->has('HoraPedido'))
                                <span class="text-danger">{{$errors->first('HoraPedido')}}</span>
                            @endif
                            </div>    
                    </div>
    
                    <div class="col-lg-4 form-group">    
                        <div>
                            <label for="HoraRecibido" class="form-fields"> HoraRecibido </label>
                            <input type="Time" class="form-control {{$errors->has('Fecha') ? 'is-invalid' : '' }}" name="HoraRecibido" id="HoraRecibido" 
                            value="" placeholder=''>
                            @if($errors->has('HoraRecibido'))
                                <span class="text-danger">{{$errors->first('HoraRecibido')}}</span>
                            @endif
                        </div>         
                    </div>

                   
                    <div class="col-lg-6 form-group">    
                        <div>
                            <label for="Descripcion_Compra" class="form-fields"> Descripción Compra </label>
                            <input type="Text" class="form-control {{$errors->has('Fecha') ? 'is-invalid' : '' }}" name="Descripcion_Compra" id="Descripcion_Compra" 
                            value="" placeholder=''>
                            @if($errors->has('Descripcion_Compra'))
                                <span class="text-danger">{{$errors->first('Descripcion_Compra')}}</span>
                            @endif
                        </div>         
                    </div>
                </div>
               
                <div class="card border-primary">
                    <div class=card-body>
                        <div class="row">
                            
                        <div class="col-lg-3 form-group">           
                            <div>
                                <label for="Id_Inventario" class="form-fields"> Inventario </label>
                                <select name="pId_Inventario" id="pId_Inventario" class="form-control {{$errors->has('Id_Inventario') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione el Inventario</option>
                                    @foreach($inventario as $inventario)
                                        <option value="{{ json_encode($inventario['id'],TRUE) }}_{{ $inventario->PrecioUnitario }}"  {{ old('Id_Inventario') == $inventario->id ? 'selected' : '' }}>{{$inventario->NombreInventario }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('Id_Inventario'))
                                        <span class="text-danger">{{$errors->first('Id_Inventario')}}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="PrecioUnitario" class="form-fields">Precio Unitario </label>
                                
                                    <input type="text" class="form-control" name="pPrecio" id="pPrecio" 
                                     value="" disabled>
                                     
                               <!-- @if($errors->has('PrecioUnitario'))
                                    <span class="text-danger">{{$errors->first('PrecioUnitario')}}</span>
                                @endif-->
                            </div>
                        </div>


                        <div class="col-lg-1 form-group">
                            <div>
                                <label for="Cantidad" class="form-fields"> Cantidad </label>
                                <input type="text" class="form-control {{$errors->has('Cantidad') ? 'is-invalid' : '' }}" 
                                name="pCantidad" id="pCantidad" value="{{old('Cantidad')}}" >
                                @if($errors->has('Cantidad'))
                                    <span class="text-danger">{{$errors->first('Cantidad')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_descuento" class="form-fields"> Descuento </label>
                                <select name="pid_descuento" id="pid_descuento" class="form-control {{$errors->has('id_descuento') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione </option>
                                    @foreach($descuentos as $descuentos)
                                        <option value="{{ $descuentos['id'] }}" {{ old('id_descuento') == $descuentos->id ? 'selected' : '' }}>{{$descuentos['ValorDescuento'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_descuento'))
                                        <span class="text-danger">{{$errors->first('id_descuento')}}</span>
                                    @endif
                            </div>
                        </div>

                        
                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_isv" class="form-fields"> ISV </label>
                                <select name="pid_isv" id="pid_isv" class="form-control {{$errors->has('id_isv') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione </option>
                                    @foreach($isv as $isv)
                                        <option value="{{ $isv['id'] }}" {{ old('id_isv') == $isv->id ? 'selected' : '' }}>{{$isv['isv'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_isv'))
                                <span class="text-danger">{{$errors->first('id_isv')}}</span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="col-lg-1 form-group">
                            <div>
                            <button type="button" id="bt_add" href="#" class="btn btn-primary">
                                Agregar
                                
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <table id="detalles" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th class="text-center">Opciones </th>
                                        <th class="text-center">Inventario </th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Cantidad </th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">ISV</th>
                                        <th class="text-center">Importe</th>
                                                            
                                    </tr>
                                </thead>
                               
                                

                                
                                <tbody >
                                <tr>
                                        <td>TOTAL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><h5 id="total">0.00</h5></td>
                                    </tr>
                                </tbody>
                            </table>
                                

                        </div>
                    </div>
                </div>
            

                    

                   
                </div>
            </div>

                    <div class="col-lg-4 form-group " id="bt_guardar"> 
                        <input name="_token " value="{{ csrf_token() }}" type="hidden"></input>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                        <a class="btn btn-secondary mr-1" href="{{url('/compras') }}">Regresar</a>
                    </div>
                <br>
            </form>


    @push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>   
    
    <script> 
       $(document).ready(function(){
           evaluar();
           $('#bt_add').click(function(){
               agregar();
           });
       });
        var cont=0;
        total=0;
        subtotal=[];

        $("#guardar").hide();

$("#pId_Inventario").change(mostrarValores);

function mostrarValores() {
   datosProducto = document.getElementById('pId_Inventario').value.split('_');
   $("#pPrecio").val(datosProducto[1]);
   
}
        
       
        function agregar()
        {
            //limpiar();
            
            idProducto=$("#pId_Inventario").val();
            Producto=$("#pId_Inventario option:selected").text();
            PrecioUnitario=$("#pPrecio").val();
            Cantidad=$("#pCantidad").val();
            id_descuento=$("#pid_descuento").val();
            id_descuentoval=$("#pid_descuento option:selected").text();
            id_isv=$("#pid_isv").val();
            id_isvval=$("#pid_isv option:selected").text();

            if(idProducto!="" && PrecioUnitario!="" && Cantidad!="" && Cantidad>0 && id_descuento!="" && id_isv!="")
            {
                subtotal[cont]=(Cantidad*PrecioUnitario);
                total=total+subtotal[cont];

                                                                                                                  
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+Producto+'</td><td><input type="number" name="PrecioUnitario[]" value="'+PrecioUnitario+'"></td><td><input type="number" name="CantidadDetalles[]" value="'+Cantidad+'"></td><td><input type="hidden" name="id_descuento[]" value="'+id_descuento+'">'+id_descuentoval+'</td><td><input type="hidden" name="id_isv[]" value="'+id_isv+'">'+id_isvval+'</td><td>'+subtotal[cont]+'</td></tr>';
               
                cont++;
                limpiar();
                $("#total").html("L. " +total);
                evaluar();
                $('#detalles').append(fila);
                
            }else{
                alert("Error al Ingresar el detalle del compra");    
                }
                
            }
        
        

        function limpiar(){
            $("#pId_Inventario").val("");
            $("#pPrecio").val("");
            $("#pCantidad").val("");
            $("#pid_descuento").val("");
            $("#pid_isv").val("");
            
        } 

        function evaluar(){
            if(total>0)
            {
                $("#bt_guardar").show();
            }else{
                $("#bt_guardar").hide();
            }

        }

        function eliminar(index) {
            total=total-subtotal[index];
            $("#total").html("L. "+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

    @endpush

    @endsection

    

    
