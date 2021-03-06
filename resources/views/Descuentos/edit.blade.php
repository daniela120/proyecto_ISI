<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo de Descuento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            @foreach($Descuentos as $Descuentos)
    <form action="{{url('/descuentos/'.$Descuentos->id)}}" method="post" id="editDescuentoForm" enctype="multipart/form-data">
          @method('PUT')
            @csrf
            @endforeach
            <div class="row">
                    <div class="col-lg-12 form-group">
                        <div>
                        <label for="Descripcion" class="form-fields"> Descripción</label>
                            <input type="text" value="{{old('Descripcion')}}" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' : '' }}"
                            rows="3" name="Descripcion" id="Descripcion">
                            @if ($errors->has('Descripcion'))
                                    <span class="text-danger">{{ $errors->first('Descripcion') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="ValorDescuento" class="form-fields"> Valor Descuento</label>
                            <input type="text" value="{{old('ValorDescuento')}}" class="form-control {{$errors->has('ValorDescuento') ? 'is-invalid' : '' }}"
                            rows="3" name="ValorDescuento" id="ValorDescuento">
                            @if ($errors->has('ValorDescuento'))
                                    <span class="text-danger">{{ $errors->first('ValorDescuento') }}</span>
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
