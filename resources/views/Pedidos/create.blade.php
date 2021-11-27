@extends('layouts.admin')

@section('titulo')

    <span>Nuevo Pedido</span>
    
    
<div class="row">
    <label for="s"> </label>   
</div>
<div class="row">
    <label for="s1"> </label>
</div>
<div class="row">
    <label for="3"> </label>
</div>
<div class="row">
    <label for="s7"> </label>
    
</div>
    <form action="{{ url('/pedidos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-6 form-group">
                        
                        <div>
                            <label for="Empleado" class="form-fields"> Empleado </label>
                            <input type="text" class="form-control {{$errors->has('Empleado') ? 'is-invalid' : '' }}" 
                            name="Empleado" id="NombreCompañia" value="{{old('Empleado')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('Empleado'))
                                    <span class="text-danger">{{ $errors->first('Empleado') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaContratacion" class="form-fields"> Fecha </label>
                                <input type="date" class="form-control" name="Fecha" id="Fecha">
                                @if($errors->has('Fecha'))
                            <span class="text-danger">{{$errors->first('Fecha')}}</span>
                            @endif
                            </div>
                        </div>
                    
                        <div class="col-lg-6 form-group">
                        
                        <div>
                            <label for="id_tipo_de_pago" class="form-fields"> Tipo Pago</label>
                    
                                <select name="id_cliente" id="id_cliente" class="form-control" >
                                   <option value="">Seleccione el tipo de pago</option>
                                @foreach($tiposdepago as $tiposdepago)
                                    <option value="{{ $tiposdepago['id'] }}">{{$tiposdepago['Nombre'] }}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('id_cliente'))
                            <span class="text-danger">{{$errors->first('id_cliente')}}</span>
                            @endif
                        </div>
                    
                    </div>

                    <div class="col-lg-6 form-group">
                        
                            <div>
                                <label for="id_cliente" class="form-fields"> Cliente</label>
                                <select name="id_cliente" id="id_cliente" class="form-control" >
                                   <option value="">Seleccione el Cliente</option>
                                
                            </div>
                        
                        </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            
                        </div>
                    </div>

                </div>
                <div class="buttons-form-submit d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                    <button type="submit" href="#" class="btn btn-primary">
                                Guardar
                                <i class="fas fa-spinner fa-spin d-none"></i>
                    </button>
                 </div>
            </form>

@endsection 
