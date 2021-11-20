<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/proveedores') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="NombreCompañia" class="form-fields"> Nombre Compañia </label>
                            <input type="text" class="form-control {{$errors->has('NombreCompañia') ? 'is-invalid' : '' }}" 
                            name="NombreCompañia" id="NombreCompañia" value="{{old('NombreCompañia')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('NombreCompañia'))
                                    <span class="text-danger">{{ $errors->first('NombreCompañia') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="NombreContacto" class="form-fields"> Nombre Contacto</label>
                            <input type="text" class="form-control {{$errors->has('NombreContacto') ? 'is-invalid' : '' }}"
                             name="NombreContacto" id="NombreContacto" value="{{old('NombreContacto')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('NombreContacto'))
                                    <span class="text-danger">{{ $errors->first('NombreContacto') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Telefono" class="form-fields">Teléfono</label>
                            <input type="text" class="form-control {{$errors->has('Telefono') ? 'is-invalid' : '' }}"
                             name="Telefono" id="Telefono" value="{{old('Telefono')}}" placeholder='Iniciar con 2,3,7,8 o 9'>
                            @if ($errors->has('Telefono'))
                                    <span class="text-danger">{{ $errors->first('Telefono') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="SitioWeb" class="form-fields"> Sitio Web</label>
                            <input type="text" class="form-control {{$errors->has('SitioWeb') ? 'is-invalid' : '' }}"
                             name="SitioWeb" id="SitioWeb" value="{{old('SitioWeb')}}" placeholder='ejm.co' >
                            @if ($errors->has('SitioWeb'))
                                    <span class="text-danger">{{ $errors->first('SitioWeb') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Direccion" class="form-fields">Direccción</label>
                            <input type="text" class="form-control {{$errors->has('Direccion') ? 'is-invalid' : '' }}"
                             name="Direccion" id="Direccion" value="{{old('Direccion')}}" >
                            @if ($errors->has('Direccion'))
                                    <span class="text-danger">{{ $errors->first('Direccion') }}</span>
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
