<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo de Tipo Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/turnos') }}" method="post" id="editturnosForm" enctype="multipart/form-data">
          @method('PUT')
            @csrf
            <div class="row">
                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Tipo Turno" class="form-fields"> Tipo de  Turno</label>
                            <input type="text" value="{{old('TipoTurno')}}" class="form-control" rows="3" name="TipoTurno" id="TipoTurno">
                            
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Descripcion" class="form-fields"> Descripcion</label>
                            <input type="text" value="{{old('Descripcion')}}" class="form-control" rows="3" name="Descripcion" id="Descripcion">
                            
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
