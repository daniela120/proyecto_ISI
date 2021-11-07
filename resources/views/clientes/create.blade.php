@<!-- Modal -->
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
                            <input type="text" class="form-control" name="Nombre" id="Nombre">
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Apellido" class="form-fields"> Apellido </label>
                            <input type="text" class="form-control" name="Apellido" id="Apellido">
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Usuario" class="form-fields"> Usuario </label>
                            <input type="text" class="form-control" name="Usuario" id="Usuario">
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Correo" class="form-fields"> Correo </label>
                            <input type="email" class="form-control" name="Correo" id="Correo">
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Contraseña" class="form-fields"> Contraseña </label>
                            <input type="password" class="form-control" name="Contraseña" id="Contraseña">
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Direccion" class="form-fields"> Direccion </label>
                            <input type="text" class="form-control" name="Direccion" id="Direccion">
                           
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Telefono" class="form-fields"> Telefono </label>
                            <input type="numeric" class="form-control" name="Telefono" id="Telefono">
                           
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="FechaNacimiento" class="form-fields"> Fecha Nacimiento </label>
                            <input type="date" class="form-control" name="FechaNacimiento" id="FechaNacimiento">
                           
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