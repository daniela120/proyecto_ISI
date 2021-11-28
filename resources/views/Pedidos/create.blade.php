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
                            
                        <div class="col-lg-4 form-group">           
                            <div>
                                <label for="id_mpleado" class="form-fields"> Producto </label>
                                <select name="empleados" id="empleados" class="form-control" >
                                    <option value="">Seleccione el Producto</option>
                                    @foreach($empleado as $empleados)
                                        <option value="{{ $empleados['id'] }}">{{$empleados['Nombre'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_empleado'))
                                <span class="text-danger">{{$errors->first('id_empleado')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="Cantidad" class="form-fields"> Cantidad </label>
                                <input type="text" class="form-control" name="Nombre_Estado" id="Nombre_Estado">
                                @if($errors->has('Nombre_Estado'))
                                    <span class="text-danger">{{$errors->first('Nombre_Estado')}}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_mpleado" class="form-fields"> Descuento </label>
                                <select name="empleados" id="empleados" class="form-control" >
                                    <option value="">Seleccione el Descuento</option>
                                    @foreach($empleado as $empleados)
                                        <option value="{{ $empleados['id'] }}">{{$empleados['Nombre'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_empleado'))
                                <span class="text-danger">{{$errors->first('id_empleado')}}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="Estado de Envio" class="form-fields"> Total Producto </label>
                                <input type="text" class="form-control" name="Nombre_Estado" id="Nombre_Estado">
                                @if($errors->has('Nombre_Estado'))
                                    <span class="text-danger">{{$errors->first('Nombre_Estado')}}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">
                            <div>
                            <button type="submit" href="#" class="btn btn-primary">
                                Agregar
                                <i class="fas fa-spinner fa-spin d-none"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <table id="dt-pedidos1" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th class="text-center">op </th>
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
                                        <td><h4 id="total">0.00</h4></td>
                                    </tr>
                        
                            </tbody>
                        </table>
                                

                        </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 form-group"> 

                </div>

                    <div class="buttons-form-submit d-flex justify-content-end">
                    <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" class="form-control" value=" Guardar Datos">
                        
                            <a class="btn btn-secondary mr-1" href="{{url('/pedidos') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
                <br>
            </form>
    @endsection

    

    
