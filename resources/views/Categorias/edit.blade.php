<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            @foreach($Categorias as $Categorias)
                <form action="{{url('/categorias/'.$Categorias->id)}}" role="form" method="POST" id="editCategoriaFrm" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}
            @endforeach
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Categoria" class="form-fields"> Categoría</label>
                                <input type="text" value="{{old('Categoria')}}" class="form-control {{$errors->has('Categoria') ? 'is-invalid' : '' }}" 
                                rows="3"  name="Categoria" id="Categoria">     
                                @if ($errors->has('Categoria'))
                                    <span class="text-danger">{{ $errors->first('Categoria') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                             
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Descripcion"> Descripción </label>
                                <input type="text" value="{{old('Descripcion')}}" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' : '' }}" 
                                rows="3" name="Descripcion" id="Descripcion">   
                                @if ($errors->has('Descripcion'))
                                    <span class="text-danger">{{ $errors->first('Descripcion') }}</span>
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