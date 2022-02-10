<!-- Modal -->
<div class="modal animated zoomIn" id="editMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            @foreach($turnos as $turnos)
    <form action="{{url('/turnos/'.$turnos->id)}}" method="post" id="editturnosFrm" enctype="multipart/form-data">
          @method('PUT')
            @csrf
            @endforeach
            <div class="row">
                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Tipo Turno" class="form-fields"> Tipo de  Turno</label>
                            <input type="text" value="{{old('TipoTurno')}}" class="form-control" rows="3" name="TipoTurno" id="TipoTurno">
                            @if($errors->has('TipoTurno'))
                            <span class="text-danger">{{$errors->first('TipoTurno')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Descripcion" class="form-fields"> Descripción</label>
                            <input type="text" value="{{old('Descripcion')}}" class="form-control" rows="3" name="Descripcion" id="Descripcion">
                            @if($errors->has('Descripcion'))
                            <span class="text-danger">{{$errors->first('Descripcion')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                        <div>
                            <label for="Hora Entrada" class="form-fields"> Hora de entrada</label>
                            <input type="time" value="{{old('HoraEntrada')}}"  class="form-control" rows="3" name="HoraEntrada" id="HoraEntrada">
                            @if($errors->has('HoraEntrada'))
                            <span class="text-danger">{{$errors->first('HoraEntrada')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Hora Salida" class="form-fields"> Hora de salida</label>
                            <input type="time" value="{{old('HoraSalida')}}" class="form-control" rows="3" name="HoraSalida" id="HoraSalida">
                            @if($errors->has('HoraSalida'))
                            <span class="text-danger">{{$errors->first('HoraSalida')}}</span>
                            @endif
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
