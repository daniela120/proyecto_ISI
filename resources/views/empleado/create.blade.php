<!-- Modal -->
<div class="modal animated zoomIn"  id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form action="" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-6 form-group">
                            <div>
                                <label for="Nombre" class="form-fields"> Nombre </label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre">
                                @if($errors->has('Nombre'))
                            <span class="text-danger">{{$errors->first('Nombre')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Apellido" class="form-fields"> Apellido </label>
                                <input type="text" class="form-control" name="Apellido" id="Apellido">
                                @if($errors->has('Apellido'))
                            <span class="text-danger">{{$errors->first('Apellido')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaNacimiento" class="form-fields"> Fecha de Nacimiento </label>
                                <input type="date" class="form-control" name="FechaNacimiento" id="FechaNacimiento">
                                @if($errors->has('FechaNacimiento'))
                            <span class="text-danger">{{$errors->first('FechaNacimiento')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaContratacion" class="form-fields"> Fecha de Contratacion </label>
                                <input type="date" class="form-control" name="FechaContratacion" id="FechaContratacion">
                                @if($errors->has('FechaContratacion'))
                            <span class="text-danger">{{$errors->first('FechaContratacion')}}</span>
                            @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="Direccion" class="form-fields"> Direccion</label>
                                <input type="text" class="form-control" name="Direccion" id="Direccion">
                                @if($errors->has('Direccion'))
                            <span class="text-danger">{{$errors->first('Direccion')}}</span>
                            @endif
                            </div>
                        </div>

                       

                        <div class="col-lg-6 form-group">
                        
                            <div>
                                <label for="IdCargo" class="form-fields"> Id Cargo</label>
                                <select name="Id_Cargo" id="Id_Cargo" class="form-control" >
                                   <option value="">Seleccione el cargo</option>
                                @foreach(  $cargos as $cargoempleado)
                                    <option value="{{ $cargoempleado['id'] }}">{{$cargoempleado['Cargo'] }}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('Id_Cargo'))
                            <span class="text-danger">{{$errors->first('Id_Cargo')}}</span>
                            @endif
                            </div>
                        
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Telefono" class="form-fields"> Telefono </label>
                                <input type="text" class="form-control" name="Telefono" id="Telefono" pattern='[2,3,7,8,9]\d{3}\d{4}'  
                                placeholder='debe iniciar con 2,3,7,8 o 9' >
                                @if($errors->has('Telefono'))
                                <span class="text-danger">{{$errors->first('Telefono')}}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdUsuario" class="form-fields"> Id Usuario</label>
                                <select name="Id_Usuario" id="Id_Usuario" class="form-control" >
                                <option value="">Seleccione el usuario</option>
                                @foreach($users as $user)

                                <option value="{{ $user['id'] }}">{{$user['name'] }}</option>

                                @endforeach
                                </select>
                                @if($errors->has('Id_Usuario'))
                            <span class="text-danger">{{$errors->first('Id_Usuario')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdDocumento" class="form-fields"> Id Documento</label>
                                <select name="Id_Documento" id="Id_Documento" class="form-control" >
                                <option value=""> Tipo de documento</option>
                                @foreach($documentos as $documento)

                                <option value="{{ $documento['id'] }}">{{$documento['TipoDocumento'] }}</option>

                                @endforeach
                                </select>
                                @if($errors->has('Id_Documento'))
                            <span class="text-danger">{{$errors->first('Id_Documento')}}</span>
                            @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdTurno" class="form-fields"> Id Turno</label>
                                <select name="Id_Turno" id="Id_Turno" class="form-control" >
                                <option value="">Seleccione el turno</option>
                                @foreach($turnos as $turno)

                                <option value="{{ $turno['id'] }}">{{$turno['TipoTurno'] }}</option>

                                @endforeach
                                </select>
                                @if($errors->has('Id_Turno'))
                            <span class="text-danger">{{$errors->first('Id_Turno')}}</span>
                            @endif
                            </div>
                        </div>

                        

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Documento" class="form-fields"> Documento</label>
                                <input type="text" class="form-control" name="Documento" id="Documento">
                                @if($errors->has('Documento'))
                            <span class="text-danger">{{$errors->first('Documento')}}</span>
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

