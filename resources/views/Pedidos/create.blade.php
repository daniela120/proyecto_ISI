@extends('layouts.admin')

@section('titulo')

    <span> Nuevo Pedido </span>
@endsection 

@section('contenido')
            
<form action="{{ url('/pedidos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class=card-body>
                <div class="row">
                   
                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="FechaContratacion" class="form-fields"> Fecha </label>
                            <input type="date" class="form-control" name="Fecha" id="Fecha">
                            @if($errors->has('Fecha'))
                                <span class="text-danger">{{$errors->first('Fecha')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 form-group">
                        <div>
                            <label for="id_cliente" class="form-fields"> Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control" >
                            <option value="">Seleccione el Cliente</option>
                            @foreach($clientes as $clientes)
                                <option value="{{ $clientes['id'] }}">{{$clientes['Nombre'] }}</option>
                            @endforeach
                            </select>
                                @if($errors->has('id_cliente'))
                            <span class="text-danger">{{$errors->first('id_cliente')}}</span>
                            @endif
                            </div>    
                    </div>
    
                    <div class="col-lg-4 form-group">    
                        <div>
                            <label for="id_tipo_de_pago" class="form-fields"> Tipo Pago</label>
                                <select name="tiposdepago" id="tiposdepago" class="form-control" >
                                   <option value="">Seleccione el tipo de pago</option>
                                @foreach($tiposdepago as $tiposdepago)
                                    <option value="{{ $tiposdepago['id'] }}">{{$tiposdepago['Nombre_Tipo_Pago'] }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('id_tipo_pago'))
                            <span class="text-danger">{{$errors->first('id_tipo_pago')}}</span>
                            @endif
                        </div>         
                    </div>

                    <div class="col-lg-4 form-group">           
                        <div>
                            <label for="id_mpleado" class="form-fields"> Empleado </label>
                            <select name="empleados" id="empleados" class="form-control" >
                                   <option value="">Seleccione el empleado</option>
                                @foreach($empleado as $empleados)
                                    <option value="{{ $empleados['id'] }}">{{$empleados['Nombre'] }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('id_empleado'))
                            <span class="text-danger">{{$errors->first('id_empleado')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
               
                <div class="card border-primary">
                    <div class=card-body>
                        <div class="row">
                            
                        <div class="col-lg-3 form-group">           
                            <div>
                                <label for="Id_producto" class="form-fields"> Producto </label>
                                <select name="txt_producto" id="txt_producto" class="form-control" >
                                    <option value="">Seleccione el Producto</option>
                                    @foreach($productos as $productos)
                                        <option value="{{ $productos['id'] }}">{{$productos['NombreProducto'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('Id_Producto'))
                                <span class="text-danger">{{$errors->first('Id_Producto')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="PrecioUnitario" class="form-fields">Precio Unitario </label>
                                <input type="text" class="form-control" name="txt_PrecioUnitario" id="txt_PrecioUnitario">
                                @if($errors->has('PrecioUnitario'))
                                    <span class="text-danger">{{$errors->first('PrecioUnitario')}}</span>
                                    @endif
                            </div>
                        </div>


                        <div class="col-lg-1 form-group">
                            <div>
                                <label for="Cantidad" class="form-fields"> Cantidad </label>
                                <input type="text" class="form-control" name="txt_cantidad" id="txt_cantidad">
                                @if($errors->has('Nombre_Estado'))
                                    <span class="text-danger">{{$errors->first('Nombre_Estado')}}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_descuento" class="form-fields"> Descuento </label>
                                <select name="txt_descuentos" id="txt_descuentos" class="form-control" >
                                    <option value="">Seleccione </option>
                                    @foreach($descuentos as $descuentos)
                                        <option value="{{ $descuentos['id'] }}">{{$descuentos['ValorDescuento'] }}</option>
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
                                <select name="txt_isv" id="txt_isv" class="form-control" >
                                    <option value="">Seleccione </option>
                                    @foreach($isv as $isv)
                                        <option value="{{ $isv['id'] }}">{{$isv['isv'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_isv'))
                                <span class="text-danger">{{$errors->first('id_isv')}}</span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="col-lg-1 form-group">
                            <div>
                            <button type="submit" id="bt_add" href="#" class="btn btn-primary">
                                Agregar
                                <i class="fas fa-spinner fa-spin d-none"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <table id="detalles" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th class="text-center">Opciones </th>
                                        <th class="text-center">Producto </th>
                                        <th class="text-center">Precio Unitario</th>
                                        <th class="text-center">Cantidad </th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">ISV</th>
                                        <th class="text-center">Importe</th>
                                                            
                                    </tr>
                                </thead>
                                <tbody>
                        
                       
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

                <div class="col-lg-4 form-group"> 

                </div>

                    <div class="buttons-form-submit d-flex justify-content-end" id="bt_guardar">
                    <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" class="form-control" value=" Guardar ">
                            <input class="btn btn-danger" type="reset" class="form-control" value=" Cancelar">
                            <a class="btn btn-secondary mr-1" href="{{url('/pedidos') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
                <br>
            </form>

    @push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>   
    
    <script> 
       $(document).ready(function(){
           $('#bt_add').click(function(){
               agregar();
           });
       });
        var cont=0;
        total=0;
        subtotal=[];
        $(#bt_guardar).hide();

        function agregar()
        {
            idProducto=$("#txt_producto").val();
            Producto=$("#txt_producto option:selected").text();
            PrecioUnitario=$("#txt_PrecioUnitario").val();
            Cantidad=$("#txt_cantidad").val();
            id_descuento=$("#txt_descuentos option:selected").text();
            id_isv=$("#txt_isv option:selected").text();

            if(idProducto!="" && PrecioUnitario!="" && Cantidad!="" && Cantidad>0 id_descuento!="" && id_isv!="")
            {
                subtotal[cont]=(Cantidad*PrecioUnitario);
                total=total+subtotal[cont];
""
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick"eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioUnitario[]" value="'+PrecioUnitario+'"></td><td><input type="number" name="id_descuento[]" value="'+id_descuento+'"></td><td><input type="number" name="id_isv[]" value="'+id_isv+'"></td><td>'+subtotal[cont]+'</td></tr>';
                cont++;
                limpiar();
                $("#total").html("L. " +total);
                evaluar();
                $('#detalles').append(fila);
            }else
                alert("Error al Ingresar el detalle del pedido");    
            }
        }

        function limpiar(){
            $("#txt_producto").val("");
            $("#txt_PrecioUnitario").val("");
            $("#txt_cantidad").val("");
            $("#txt_descuentos").val("");
            $("#txt_isv").val("");
            
        } 

        function evaluar(){
            if(total>0)
            {
                $(#bt_guardar).show();
            }else{
                $(#bt_guardar).hide();
            }

        }

        function eliminar(index) {
            total=total-subtotal[index];
            $("#total").html("L. "+total);
            $("#fila" + index).remove());
            evaluar();
        }
    </script>

    @endpush

    @endsection

    

    
