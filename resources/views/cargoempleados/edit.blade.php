<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" role="form" method="POST" id="editCargoempleadoFrm" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Cargo" class="form-fields"> Cargo</label>
                                <input type="text" value="{{old('Cargo')}}" 
                                class="form-control {{$errors->has('Cargo') ? 'is-invalid' : '' }}" 
                                rows="3"  name="Cargo" id="Cargo">
                                @if($errors->has('Cargo'))
                                    <span class="text-danger">{{$errors->first('Cargo')}}</span>
                                @endif   
                            </div>
                        </div>
                    </div>
                             
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Descripcion"> Descripción </label>
                                <input type="text" value="{{old('Descripcion')}}" 
                                class="form-control form-control {{$errors->has('Descripcion') ? 'is-invalid' : ''}}" 
                                rows="3" name="Descripcion" id="Descripcion">  
                                @if($errors->has('Descripcion'))
                                    <span class="text-danger">{{$errors->first('Descripcion')}}</span>
                                @endif 
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