<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-6 form-group">
                            <div>
                                <label for="Nombre" class="form-fields"> Nombre </label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Apellido" class="form-fields"> Apellido </label>
                                <input type="text" class="form-control" name="Apellido" id="Apellido">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaNacimiento" class="form-fields"> Fecha de Nacimiento </label>
                                <input type="date" class="form-control" name="FechaNacimiento" id="FechaNacimiento">
                                
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="FechaContratacion" class="form-fields"> Fecha de Contratacion </label>
                                <input type="date" class="form-control" name="FechaContratacion" id="FechaContratacion">
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Direccion" class="form-fields"> Direccion</label>
                                <input type="text" class="form-control" name="Direccion" id="Direccion">
                            
                            </div>
                        </div>

                       

                        <div class="col-lg-6 form-group">
                        
                            <div>
                                <label for="IdCargo" class="form-fields"> Id Cargo</label>
                                <select name="Id_Cargo" id="Id_Cargo" class="form-control" >
                                   
                                @foreach( $empleado as $cargoempleado)
                                    <option value="{{ $cargoempleado['id'] }}">{{$cargoempleado['Cargo'] }}</option>

                                    @endforeach
                                </select>
                            
                            </div>
                        
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Telefono" class="form-fields"> Telefono </label>
                                <input type="text" class="form-control" name="Telefono" id="Telefono">
                                
                            </div>
                        </div>



                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdUsuario" class="form-fields"> Id Usuario</label>
                                <input type="select" class="form-control" name="Id Usuario" id="Id Usuario">
                            
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdDocumento" class="form-fields"> Id Documento</label>
                                <input type="select" class="form-control" name="Id Documento" id="Id Documento">
                            
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="IdTurno" class="form-fields"> Id Turno</label>
                                <input type="select" class="form-control" name="Id Turno" id="Id Turno">
                            
                            </div>
                        </div>

                        

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="Documento" class="form-fields"> Documento</label>
                                <input type="text" class="form-control" name="Documento" id="Documento">
                            
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
