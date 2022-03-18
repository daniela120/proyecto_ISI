
@extends('layouts.admin')

@section('titulo')

    <span> Nueva Factura </span>

    
        
@endsection 

@section('contenido')
            
<form action="{{ url('/factura') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class=card-body>
                <div class="row">
                   
                <div class="col-lg-3 form-group">
                            <div>
                                <label for="fecha" class="form-fields">Fecha</label>
                                <p>{{\Carbon\Carbon::parse($hoy)->format('d M y h:i a')}}</p> 
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="Direccion" class="form-fields">Dirección</label>
                                <p>Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101</p> 
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="idpedido" class="form-fields">Num Pedido</label>
                                
                                <p>{{($datopedido)}}</p> 
                                <input type="hidden" name="inputpedido" id="inputpedido" value="{{($datopedido)}}">
                                
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="impuesto" class="form-fields">Impuesto</label>
                                
                                <p>{{($acumimpuesto)}}</p> 
                                
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="subtotal" class="form-fields">Subtotal</label>
                                
                                <p>{{($subtotalpedido)}}</p> 
                                
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="descuento" class="form-fields">Descuento</label>
                                
                                <p>{{($acumdescuento)}}</p> 
                                
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="total" class="form-fields">Total</label>
                                
                                <p>{{($valortotal)}}</p> 
                                <input type="hidden" name="inputtotal" id="inputtotal" value="{{($valortotal)}}">
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="empleadoatendio" class="form-fields">Atendido por:</label>
                                
                                <p>{{($empleadonombre)}}</p> 
                                
                                
                               
                            </div>
                    </div>

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="clientedepedido" class="form-fields">Cliente:</label>
                                
                                <p>{{($clientenombre)}}</p> 
                                
                                
                               
                            </div>
                    </div>


                    <!-- <div class="col-lg-4 form-group">
                        <div>
                            <label for="id_cliente" class="form-fields"> Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control {{$errors->has('id_cliente') ? 'is-invalid' : '' }}"
                            value="">
                            <option value="">Seleccione el Cliente</option>
                            @foreach($clientes as $clientes)
                                <option value="{{ $clientes['id'] }}" {{ old('id_cliente') == $clientes->id ? 'selected' : '' }}>{{$clientes['Nombre'] }}</option>
                            @endforeach
                            </select>
                                @if($errors->has('id_cliente'))
                            <span class="text-danger">{{$errors->first('id_cliente')}}</span>
                            @endif
                            </div>    
                    </div>-->
    
                    <div class="col-lg-4 form-group">    
                        <div>
                            <label for="id_tipo_de_pago" class="form-fields"> Tipo Pago</label>
                                <select name="id_tipo_de_pago" id="id_tipo_de_pago" class="form-control {{$errors->has('id_tipo_de_pago') ? 'is-invalid' : '' }}" >
                                   
                                @foreach($tiposdepago as $tiposdepago)
                                    <option value="{{ $tiposdepago['id'] }}" {{ old('id_tipo_de_pago') == $tiposdepago->id ? 'selected' : '' }}>{{$tiposdepago['Nombre_Tipo_Pago'] }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('id_de_tipo_pago'))
                                     <span class="text-danger">{{$errors->first('id_de_tipo_pago')}}</span>
                                @endif
                        </div>         
                    </div>

                    </div>

                    <div class="card border-primary">
                        <div class=card-body>
                        <div class="row">


                        @if(count($errors)>0)

                            <div class="alert alert-primary" role="alert">
                                <ul>
                                @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>  
                                @endforeach
                                </ul>
                            
                            </div>

                            

                        @endif

                    <div class="col-lg-8 form-group">
                            <div class="col-lg-6 form-group" id="mostrartarjeta">
                                <label for="labeltarjeta">Num Tarjeta</label>
                               <p> <input type="text" name="tarjeta" id="tarjeta"  placeholder='Ingrese num de tarjeta'></p>
                            </div>
                            <div class="col-lg-6 form-group" id="mostrarmontotarjeta">
                                <p><label for="labeltarjetamonto">Monto</label></p>
                                <input type="text" name="montodetarjeta" id="montodetarjeta" placeholder='Ingrese el monto'>
                            </div>
                            
                    </div>
                    

                            <div class="col-lg-4 form-group" id="mostrarefectivo">
                                <label for="labelefectivo">Monto en Efectivo</label>
                                <p><input type="text" name="efectivo" id="efectivo"> </p>
                                
                            </div>

                    

                    <div class="col-lg-3 form-group">
                            <div>
                            <button type="button" id="bt_monto" href="#" class="btn btn-primary">
                                Cambiar Tipo de Pago
                                
                                </button>
                            </div>
                    </div>

                   

                    </div>
                    </div>
                    
                        </div>







                   

                    <div class="col-lg-4 form-group " id="bt_guardar"> 
                        <input name="_token " value="{{ csrf_token() }}" type="hidden"></input>
                        <button class="btn btn-primary" id="bt_save" type="submit"><i class="fas fa-print"></i></button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                        <a class="btn btn-secondary mr-1" href="{{url('/pedidos') }}">Regresar</a>
                        
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
           /**$('#bt_save').click(function(){
               calcular();
           });**/
           $('#bt_monto').click(function(){
               mostrarmontos();
           });
           
       });


       
        var cont=0;
        total=0;
        subtotal=[];
        TipoPago=$("#id_tipo_de_pago option:selected").text();
        valortarjeta=0;
        valorpago=$("#inputtotal").val(); 
        
        
        Efectivo=$("#efectivo").val();


        /**function calcular() {
            if (Efectivo<valorpago) {
                alert("El monto debe ser igual al total");
            }
            
        }**/

        
        
       
        function agregar()
        {
            //limpiar();
            
            idProducto=$("#pId_Producto").val();
            Producto=$("#pId_Producto option:selected").text();
            PrecioUnitario=$("#pPrecioUnitario").val();
            Cantidad=$("#pCantidad").val();
            id_descuento=$("#pid_descuento").val();
            id_descuentoval=$("#pid_descuento option:selected").text();
            id_isv=$("#pid_isv").val();
            id_isvval=$("#pid_isv option:selected").text();

            if(idProducto!="" && PrecioUnitario!="" && Cantidad!="" && Cantidad>0 && id_descuento!="" && id_isv!="")
            {
                subtotal[cont]=(Cantidad*PrecioUnitario);
                total=total+subtotal[cont];

                                                                                                                        
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick"eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+Producto+'</td><td><input type="number" name="PrecioUnitario[]" value="'+PrecioUnitario+'"></td><td><input type="number" name="CantidadDetalles[]" value="'+Cantidad+'"></td><td><input type="hidden" name="id_descuento[]" value="'+id_descuento+'">'+id_descuentoval+'</td><td><input type="hidden" name="id_isv[]" value="'+id_isv+'">'+id_isvval+'</td><td>'+subtotal[cont]+'</td></tr>';
               // var fila='<tr class="selected" id="fila'+cont+'"><input type="number" name="idProductos[]" value="'+idProducto+'">'+Producto+'</td></tr>';
                
                cont++;
                limpiar();
                $("#total").html("L. " +total);
                evaluar();
                $('#detalles').append(fila);
                
            }else{
                alert("Error al Ingresar el detalle del pedido");    
                }
                
            }
        
        

        function limpiar(){
            $("#pId_Producto").val("");
            $("#pPrecioUnitario").val("");
            $("#pCantidad").val("");
            $("#pid_descuento").val("");
            $("#pid_isv").val("");
            $("#efectivo").val("");
            $("#monto de tarjeta").val("");
            
            
            
        } 

        function evaluar(){
            TipoPago=$("#id_tipo_de_pago option:selected").text();
            //$("#bt_guardar").hide();
            limpiar();

            if(TipoPago=="Tarjeta")
            {
                
                $("#mostrartarjeta").show();
                $("#mostrarmontotarjeta").hide();
                
                $("#mostrarefectivo").hide();
            }else{
                if (TipoPago=="Mixto") {
                    $("#mostrartarjeta").show();
                    $("#mostrarmontotarjeta").show();
                    $("#mostrarefectivo").show();                    
                }else{
                    if (TipoPago=="Efectivo"){
                        $("#mostrarefectivo").show(); 
                        $("#mostrartarjeta").hide();
                        $("#mostrarmontotarjeta").hide();
                    }
                }
               
            }
            

        }


        

        function mostrarmontos(){
            evaluar();

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