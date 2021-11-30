<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Estado de envío</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            @foreach($Estadoenvios as $Estadoenvios)
                <form action="{{url('/estadoenvios/'.$Estadoenvios->id)}}" role="form" method="POST" id="editEstadoenvioFrm" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}
            @endforeach        

                   
                             
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Estado de envio"> Estado de envío </label>
                                <input type="text" value="{{old('Nombre_Estado')}}" class="form-control" rows="3" name="Nombre_Estado" id="Nombre_Estado">   
                                @if($errors->has('Nombre_Estado'))
                                <span class="text-danger">{{$errors->first('Nombre_Estado')}}</span>
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