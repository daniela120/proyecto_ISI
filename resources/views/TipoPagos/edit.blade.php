<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar un Tipo de Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" role="form" method="POST" id="editPagoFrm" enctype="multipart/form-data">
                    @method('put')
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Nombre_Tipo_Pago" class="form-fields"> Tipo de Pago</label>
                                <input type="text" value="{{old('Nombre_Tipo_Pago')}}" class="form-control {{$errors->has('Nombre_Tipo_Pago') ? 'is-invalid' : '' }}"
                                 rows="3"  name="Nombre_Tipo_Pago" id="Nombre_Tipo_Pago">     
                                @if($errors->has('Nombre_Tipo_Pago'))
                            <span class="text-danger">{{$errors->first('Nombre_Tipo_Pago')}}</span>
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