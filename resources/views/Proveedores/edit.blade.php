<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            @foreach($Proveedores as $Proveedores)
                <form action="{{url('/proveedores/'.$Proveedores->id)}}" role="form" method="POST" id="editProveedorFrm" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}
            @endforeach
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="NombreCompañia" class="form-fields"> Nombre Compañia</label>
                                <input type="text" value="{{old('NombreCompania')}}" class="form-control {{$errors->has('NombreCompañia') ? 'is-invalid' : '' }}" 
                                rows="3"  name="NombreCompañia" id="NombreCompañia">     
                                @if ($errors->has('NombreCompañia'))
                                    <span class="text-danger">{{ $errors->first('NombreCompañia') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                             
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="NombreContacto" class="form-fields"> Nombre Contacto</label>
                                <input type="text" value="{{old('NombreContacto')}}" class="form-control {{$errors->has('NombreContacto') ? 'is-invalid' : '' }}" 
                                rows="3"  name="NombreContacto" id="NombreContacto">     
                                @if ($errors->has('NombreContacto'))
                                    <span class="text-danger">{{ $errors->first('NombreContacto') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                             
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Telefono" class="form-fields">Teléfono</label>
                            <input type="text" value="{{old('Telefono')}}" pattern='[2,3,7,8,9]\d{3}\d{4}'  placeholder='Iniciar con 2,3,7,8 o 9' class="form-control {{$errors->has('Telefono') ? 'is-invalid' : '' }}"
                             name="Telefono" id="Telefono">
                            @if ($errors->has('Telefono'))
                                    <span class="text-danger">{{ $errors->first('Telefono') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="SitioWeb" class="form-fields"> Sitio Web</label>
                            <input type="text" value="{{old('SitioWeb')}}" class="form-control {{$errors->has('SitioWeb') ? 'is-invalid' : '' }}"
                             name="SitioWeb" id="SitioWeb">
                            @if ($errors->has('SitioWeb'))
                                    <span class="text-danger">{{ $errors->first('SitioWeb') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Direccion" class="form-fields">Dirección</label>
                            <input type="text" value="{{old('Direccion')}}" class="form-control {{$errors->has('Direccion') ? 'is-invalid' : '' }}"
                             name="Direccion" id="Direccion">
                            @if ($errors->has('Direccion'))
                                    <span class="text-danger">{{ $errors->first('Direccion') }}</span>
                            @endif
                        </div>
                    </div>
                                    
                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">
                            Cerrar
                        </button>
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