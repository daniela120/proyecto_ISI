<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



            @foreach($inventarios as $inventario)
                <form   method="POST"  action= "{{url('/inventarios/.$inventarios->id' )}} " role="form" id="editInventariosFrm" enctype="multipart/form-data">
                   @method('PUT')
                    @csrf
              @endforeach
            
             <div class="row">
            <div class="col-lg-6 form-group">
                            <div>
                                <label for="NombreInventario" class="form-fields"> Nombre Inventario </label>
                                <input type="text" class="form-control" value="{{old('NombreInventario')}}"name="NombreInventario" id="NombreInventario">
                                @if($errors->has('NombreInventario'))
                            <span class="text-danger">{{$errors->first('NombreInventario')}}</span>
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

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="StockActual" class="form-fields"> Stock Actual </label>
                                <input type="number" class="form-control" value="{{old('StockActual')}}"name="StockActual" id="StockActual">
                                @if($errors->has('StockActual'))
                            <span class="text-danger">{{$errors->first('StockActual')}}</span>
                            @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="StockMin" class="form-fields"> Stock Min </label>
                                <input type="number" class="form-control" value="{{old('StockMin')}}" name="StockMin" id="StockMin">
                                @if($errors->has('StockMin'))
                            <span class="text-danger">{{$errors->first('StockMin')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="StockMax" class="form-fields"> Stock Max </label>
                                <input type="number" class="form-control" value="{{old('StockMax')}}" name="StockMax" id="StockMax">
                                @if($errors->has('StockMax'))
                            <span class="text-danger">{{$errors->first('StockMax')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                        
                        <div>
                            <label for="IdProveedor" class="form-fields"> Id Proveedor</label>
                            <select name="Id_Proveedor" id="Id_Proveedor"  value="{{old('Id_Proveedor')}}" class="form-control" >
                               <option value="">Seleccione el proveedor</option>
                            @foreach(  $proveedores as $proveedores)
                                <option value="{{$proveedores['id'] }}">{{$proveedores['NombreCompañia'] }}</option>

                                @endforeach
                            </select>
                            @if($errors->has('Id_Proveedor'))
                        <span class="text-danger">{{$errors->first('Id_Proveedor')}}</span>
                        @endif
                        </div>
                    
                    </div>


                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Descontinuado" class="form-fields"> Descontinuado </label>
                                <input type="number" class="form-control"value="{{old('Descontinuado')}}" name="Descontinuado" id="Descontinuado"pattern='[0,1]\d{0}\d{1}' 
                                placeholder='debe ser 0 ó 1' >
                                @if($errors->has('Descontinuado'))
                                <span class="text-danger">{{$errors->first('Descontinuado')}}</span>
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