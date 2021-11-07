<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" role="form" method="POST" id="editClientesFrm" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Nombre" class="form-fields"> Nombre </label>
                                <input type="text" value="{{old('Nombre')}}" class="form-control" rows="3"  name="Nombre" id="Nombre">     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Apellido">  Apellido </label>
                                <input type="text" value="{{old('Apellido')}}" class="form-control" rows="3"  name="Apellido" id="Nombre">     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Usuario"> Usuario </label>
                                <input type="text" value="{{old('Usuario')}}" class="form-control" rows="3"  name="Usuario" id="Usuario">     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Correo" > Correo </label>
                                <input type="text" value="{{old('Correo')}}" class="form-control" rows="3"  name="Correo" id="Correo">     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Contraseña" > Contraseña </label>
                                <input type="password" value="{{old('Contraseña')}}" class="form-control" rows="3"  name="Contraseña" id="Contraseña">     
                            </div>
                        </div>
                    </div>
                             
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Direccion"> Direccion </label>
                                <input type="text" value="{{old('Direccion')}}" class="form-control" rows="3" name="Direccion" id="Direccion">   
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Telefono" > Telefono </label>
                                <input type="numeric" value="{{old('Telefono')}}" class="form-control" rows="3"  name="Telefono" id="Telefono">     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="FechaNacimiento" > Fecha Nacimiento </label>
                                <input type="date" value="{{old('FechaNacimiento')}}" class="form-control" rows="3"  name="FechaNacimiento" id="FechaNacimiento">     
                            </div>
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