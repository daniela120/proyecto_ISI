@extends('layouts.admin')

@section('titulo')

    <span>Editar Rol</span>
    

@endsection
@section('contenido')

    @if(session('info'))
        .<div class="alert alert-success" role="alert">
            <strong> {{session('info') }}</strong>
        </div>
    @endif

<div class="card">
    <form action="{{ route('roles.update', $role->id) }}" method="post" class="form-horizontal">
    @csrf
    @method('PUT')

    <div class="card-body">
        <p class="h5">Nombre:</p>


        <p class="form-control">{{$role->name}}</p> 
        
    

        <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table">
                                    <tbody>
                                    @foreach ($permissions as $id => $permission)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="permissions[]"
                                                            value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : ''}}
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check" value=""></span>
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
                    </div>
                </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
    </div>
    <div class="buttons-form-submit d-flex justify-content-end">
    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
    <!-- <button href="{{ route('roles.index')}}" type="button" class="btn btn-secondary mr-1" >Cerrar</button> -->
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
