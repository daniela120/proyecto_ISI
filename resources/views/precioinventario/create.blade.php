<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Precio Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form action="{{ url('/precioinventario') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-6 form-group">
                            <div>
                                <label for="Precio" class="form-fields">Precio</label>
                                <input type="text" class="form-control" value="{{old('Precio')}}"name="Precio" id="Precio">
                                @if($errors->has('Precio'))
                            <span class="text-danger">{{$errors->first('Precio')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                        
                            <div>
                                <label for="IdCategoria" class="form-fields"> Id Categoria</label>
                                <select name="Id_Categoria" value="{{old('Id_Categoria')}}"id="Id_Categoria" class="form-control" >
                                   <option value="">Seleccione la categoría</option>
                                @foreach(  $categorias as $categorias)
                                    <option value="{{ $categorias['id'] }}">{{$categorias['Categoria'] }}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('Id_Categoria'))
                            <span class="text-danger">{{$errors->first('Id_Categoria')}}</span>
                            @endif
                            </div>
                        
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="PrecioUnitario" class="form-fields"> Precio Unitario </label>
                                <input type="text" class="form-control"value="{{old('PrecioUnitario')}}" name="PrecioUnitario" id="PrecioUnitario">
                                @if($errors->has('PrecioUnitario'))
                            <span class="text-danger">{{$errors->first('PrecioUnitario')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="CantidadStock" class="form-fields"> Cantidad Stock </label>
                                <input type="text" class="form-control"value="{{old('CantidadStock')}}" name="CantidadStock" id="CantidadStock">
                                @if($errors->has('CantidadStock'))
                            <span class="text-danger">{{$errors->first('CantidadStock')}}</span>
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

