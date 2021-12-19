<!-- Modal -->
<div class="modal animated zoomIn" id="deleteMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Eliminar Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <!-- campos(labels y textbox)-->
            <div class="modal-body">
            @foreach($isv as $isv)
                <form action="{{url('/isv/.$isv->id' )}}" role="form" method="POST" id="deleteIsvFrm" enctype="multipart/form-data">
                @method('DELETE')
                    {{csrf_field()}}
                    @endforeach
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="isc" class="form-fields"> ¿Esta seguro de eliminar el registro de isv?</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">
                                Cerrar
                        </button>
                        <button type="submit" href="#" class="btn btn-primary">
                                 Eliminar
                            <i class="fas fa-spinner fa-spin d-none"></i>
                        </button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>