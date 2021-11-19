<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/clientes') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Nombre" class="form-fields"> Nombre </label>
                            <input type="text" class="form-control {{$errors->has('Nombre') ? 'is-invalid' : '' }}" 
                            name="Nombre" id="Nombre" value="{{old('Nombre')}}" placeholder='Primer letra en Mayuscula'>
                            @if($errors->has('Nombre'))
                            <span class="text-danger">{{$errors->first('Nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Apellido" class="form-fields"> Apellido </label>
                            <input type="text" class="form-control {{$errors->has('Apellido') ? 'is-invalid' : '' }}" 
                            name="Apellido" id="Apellido" value="{{old('Apellido')}}" placeholder='Primer letra en Mayuscula'>
                            @if($errors->has('Apellido'))
                            <span class="text-danger">{{$errors->first('Apellido')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Usuario" class="form-fields"> Usuario </label>
                            <input type="text" class="form-control {{$errors->has('Usuario') ? 'is-invalid' : '' }}" 
                            name="Usuario" id="Usuario" value="{{old('Usuario')}}" placeholder='user01'>
                            @if($errors->has('Usuario'))
                            <span class="text-danger">{{$errors->first('Usuario')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Correo" class="form-fields"> Correo </label>
                            <input type="email" class="form-control {{$errors->has('Correo') ? 'is-invalid' : '' }}" 
                            name="Correo" id="Correo" value="{{old('Correo')}}" placeholder='ejm@gg.co'>
                            @if($errors->has('Correo'))
                            <span class="text-danger">{{$errors->first('Correo')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Contraseña" class="form-fields"> Contraseña </label>
                            <input type="password" class="form-control {{$errors->has('Contraseña') ? 'is-invalid' : '' }}" 
                            name="Contraseña" id="Contraseña" value="{{old('Contraseña')}}" placeholder='contraseña01'>
                            @if($errors->has('Contraseña'))
                            <span class="text-danger">{{$errors->first('Contraseña')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Direccion" class="form-fields"> Dirección </label>
                            <input type="text" class="form-control {{$errors->has('Direccion') ? 'is-invalid' : '' }}" 
                            name="Direccion" id="Direccion" value="{{old('Direccion')}}">
                            @if($errors->has('Direccion'))
                            <span class="text-danger">{{$errors->first('Direccion')}}</span>
                            @endif
                           
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Telefono" class="form-fields"> Teléfono </label>
                            <input type="tel" class="form-control {{$errors->has('Telefono') ? 'is-invalid' : '' }}" 
                            name="Telefono" id="Telefono" value="{{old('Telefono')}}"  pattern='[2,3,7,8,9]\d{3}\d{4}'
                            placeholder='debe iniciar con 2,3,7,8 o 9'>
                            @if($errors->has('Telefono'))
                            <span class="text-danger">{{$errors->first('Telefono')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="FechaNacimiento" class="form-fields"> Fecha Nacimiento </label>
                            <input type="date" class="form-control {{$errors->has('FechaNacimiento') ? 'is-invalid' : '' }}" 
                            name="FechaNacimiento" id="FechaNacimiento" value="{{old('FechaNacimiento')}}">
                            @if($errors->has('FechaNacimiento'))
                            <span class="text-danger">{{$errors->first('FechaNacimiento')}}</span>
                            @endif
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
         </div>
        </div>
    </div>
</div>