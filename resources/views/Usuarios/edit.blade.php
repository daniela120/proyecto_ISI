<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" role="form" method="POST" id="editUserFrm" enctype="multipart/form-data">
                @method('PATCH')
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                            <label for="email" class="form-fields"> Email </label>
                            <input type="text" value="{{old('email')}}" class="form-control" rows="3"  name="email" id="email">
                            @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif    
                        </div>
                         </div>
                    </div>
                    
                   <!-- <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                            <label for="password" class="form-fields"> Contraseña </label>
                            <input type="text" value="{{old('password')}}" class="form-control" rows="3"  name="password" id="password">
                            @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>-->
                    
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="nombre"> Nombre </label>
                                <input type="text" value="{{old('name')}}" class="form-control" rows="3" name="name" id="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
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