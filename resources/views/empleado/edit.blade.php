<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           
            $empleados = Empleado::where('id',$id)->get();
          
            @foreach($empleados as $empleados)
           
                <form   method="POST"  action= "{{url('/empleado/'.$empleados->id)}} " role="form" id="editEmpleadoFrm" enctype="multipart/form-data">
                   @method('PUT')
                    @csrf
                  

                    <div class="row">
            <div class="col-lg-6 form-group">
                            <div>
                                <label for="Nombre" class="form-fields"> Nombre </label>
                                <input type="text"value="{{old('Nombre')}}"  class="form-control" name="Nombre" id="Nombre">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Apellido" class="form-fields"> Apellido </label>
                                <input type="text" value="{{old('Apellido')}}"  class="form-control" name="Apellido" id="Apellido">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaNacimiento" class="form-fields"> Fecha de Nacimiento </label>
                                <input type="date" value="{{old('FechaNacimiento')}}"  class="form-control" name="FechaNacimiento" id="FechaNacimiento">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaContratacion" class="form-fields"> Fecha de Contratacion </label>
                                <input type="date" value="{{old('FechaContratacion')}}"  class="form-control" name="FechaContratacion" id="FechaContratacion">
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Direccion" class="form-fields"> Direccion</label>
                                <input type="text" value="{{old('Direccion')}}"  class="form-control" name="Direccion" id="Direccion">
                            
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                        
                        <div>
                            <label for="IdCargo" class="form-fields"> Id Cargo</label>
                            <select name="Id_Cargo" id="Id_Cargo" class="form-control" >
                               
                            @foreach(  $cargos as $cargoempleado)
                                <option value="{{ $cargoempleado['id'] }}">{{$cargoempleado['Cargo'] }}</option>

                                @endforeach
                            </select>
                        
                        </div>
                    
                    </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Telefono" class="form-fields"> Telefono </label>
                                <input type="text" value="{{old('Telefono')}}" class="form-control" name="Telefono" id="Telefono">
                                
                            </div>
                        </div>



                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdUsuario" class="form-fields"> Id Usuario</label>
                                <select name="Id_Turno" id="Id_Turno" class="form-control" >
                                   
                                @foreach($users as $user)

                                <option value="{{ $user['id'] }}">{{$user['name'] }}</option>

                                @endforeach
                                </select>
                            
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdDocumento" class="form-fields"> Id Documento</label>
                                <select name="Id_Documento" id="Id_Documento" class="form-control" >
                                   
                                @foreach($documentos as $documento)

                                <option value="{{ $documento['id'] }}">{{$documento['TipoDocumento'] }}</option>

                                @endforeach
                                </select>
                            
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdTurno" class="form-fields"> Id Turno</label>
                                <select name="Id_Turno" id="Id_Turno" class="form-control" >
                                   
                                @foreach($turnos as $turno)

                                <option value="{{ $turno['id'] }}">{{$turno['TipoTurno'] }}</option>

                                @endforeach
                                </select>
                            
                            </div>
                        </div>

                        

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Documento" class="form-fields"> Documento</label>
                                <input type="text" value="{{old('Documento')}}"  class="form-control" name="Documento" id="Documento">
                            
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
                @endforeach
            </div>
        </div>
    </div>
</div>