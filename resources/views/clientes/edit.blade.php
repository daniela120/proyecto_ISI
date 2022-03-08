<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            @foreach($clientes as $clientes)
    <form action="{{url('/clientes/'.$clientes->id)}}" method="post" id="editClientesFrm" enctype="multipart/form-data">
          @method('PUT')
            @csrf
            @endforeach
            <div class="row">
                    
                <div class="col-lg-12 form-group">
                    <div>
                        <label for="Nombre" class="form-fields"> Nombre </label>
                        <input type="text" value="{{old('Nombre')}}" 
                        class="form-control {{$errors->has('Nombre') ? 'is-invalid' : '' }}" 
                        rows="3"  name="Nombre" id="Nombre">  
                        @if($errors->has('Nombre'))
                            <span class="text-danger">{{$errors->first('Nombre')}}</span>
                        @endif 
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <div>
                        <label for="Apellido"> Apellido </label>
                        <input type="text" value="{{old('Apellido')}}" 
                        class="form-control {{$errors->has('Apellido') ? 'is-invalid' : '' }}" 
                        rows="3"  name="Apellido" id="Apellido">   
                        @if($errors->has('Apellido'))
                            <span class="text-danger">{{$errors->first('Apellido')}}</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <div>
                        <label for="Id_Usuario"> Id_Usuario </label>
                        <select name="Id_Usuario" value="{{old('Id_Usuario')}}" id="Id_Usuario" class="form-control" >
                        <option value="">Seleccione el usuario</option>   
                        @foreach($users as $user)

                        <option value="{{ $user['id'] }}" {{ old('Id_Usuario') == $user->id ? 'selected' : '' }}>{{$user['name'] }}</option>

                        @endforeach
                        </select>   
                        @if($errors->has('Id_Usuario'))
                            <span class="text-danger">{{$errors->first('Id_Usuario')}}</span>
                        @endif
                    </div>
                </div>


                <div class="col-lg-12 form-group">
                    <div>
                        <label for="Direccion"> Dirección </label>
                        <input type="text" value="{{old('Direccion')}}" 
                        class="form-control {{$errors->has('Direccion') ? 'is-invalid' : '' }}" 
                        rows="3" name="Direccion" id="Direccion">
                        @if($errors->has('Direccion'))
                            <span class="text-danger">{{$errors->first('Direccion')}}</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <div>
                        <label for="Telefono" > Teléfono </label>
                        <input type="numeric" value="{{old('Telefono')}}" 
                        class="form-control {{$errors->has('Telefono') ? 'is-invalid' : '' }}" 
                        rows="3"  name="Telefono" id="Telefono" pattern='[2,3,7,8,9]\d{3}\d{4}'
                        placeholder='inicie con 2,3,7,8 o 9'>
                        @if($errors->has('Telefono'))
                            <span class="text-danger">{{$errors->first('Telefono')}}</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <div>
                        <label for="FechaNacimiento" > Fecha Nacimiento </label>
                        <input type="date" value="{{old('FechaNacimiento')}}" 
                        class="form-control {{$errors->has('FechaNacimiento') ? 'is-invalid' : '' }}" 
                        rows="3"  name="FechaNacimiento" id="FechaNacimiento">
                        @if($errors->has('FechaNacimiento'))
                            <span class="text-danger">{{$errors->first('FechaNacimiento')}}</span>
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
