<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuev Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="NombreProducto" class="form-fields"> Nombre Producto </label>
                            <input type="text" class="form-control {{$errors->has('NombreProducto') ? 'is-invalid' : '' }}" 
                            name="NombreProducto" id="NombreProducto" value="{{old('NombreProducto')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('NombreProducto'))
                                    <span class="text-danger">{{ $errors->first('NombreProducto') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div>
                            <label for="Descripcion" class="form-fields"> Descripción</label>
                            <input type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' : '' }}"
                             name="Descripcion" id="Descripcion" value="{{old('Descripcion')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('Descripcion'))
                                    <span class="text-danger">{{ $errors->first('Descripcion') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">
                        <div>
                        <label for="idCategoria" class="form-fields"> Id Categoria</label>
                                <select name="id_Categoria" value="{{old('id_Categoria')}}"id="id_Categoria" class="form-control" >
                                   <option value="">Seleccione la categoría</option>
                                @foreach(  $categorias as $categorias)
                                    <option value="{{ $categorias['id'] }}">{{$categorias['Categoria'] }}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('id_Categoria'))
                            <span class="text-danger">{{$errors->first('id_Categoria')}}</span>
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
