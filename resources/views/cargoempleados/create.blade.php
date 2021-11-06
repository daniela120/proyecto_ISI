<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nueva Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/cargoempleados') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Cargo" class="form-fields"> Cargos Empleados </label>
                            <input type="text" class="form-control" name="Cargo" id="Cargo">
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Descripcion" class="form-fields"> Descripción</label>
                            <input type="text" class="form-control" name="Descripcion" id="Descripcion">
                           
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