<!-- Modal -->
@extends('layouts.admin')

@section('titulo')

    <span>Asignar Rol</span>
    

@endsection
@section('contenido')

    @if(session('info'))
        .<div class="alert alert-success" role="alert">
            <strong> {{session('info') }}</strong>
        </div>
    @endif

<div class="card">
<form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
    @csrf


    <div class="card-body">
            <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" autocomplete="off" autofocus>
                  </div>
                </div>
              </div>
        
    

        <div class="row">
        <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    
                        <table class="table">
                          <tbody>
                            @foreach ($permissions as $id => $permission)
                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                      value="{{ $id }}">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>
                                {{ $permission }}
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>

                  </div>
                </div>

            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
    </div>
    <div class="buttons-form-submit d-flex justify-content-end">
        <button href="{{ route('usuarios.usuariosindex')}}" type="button" class="btn btn-secondary mr-1" >Cerrar</button>
    </div>
</div>
        



</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush
