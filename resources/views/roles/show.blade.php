@extends('layouts.admin')

@section('titulo')

    <span>Rol</span>
    

@endsection
@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">rol</div>
            <p class="card-category">Vista detallada del rol {{ $role->name }}</p>
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif

              <!--Start third-->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td>{{ $role->id }}
                          </td>
                        </tr>
                        <tr>
                          <th>Name</th>
                          <td>{{ $role->name }}</td>
                        </tr>
                        <tr>

                        <tr>
                            <th>Roles</th>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge rounded-pill bg-dark text-white">{{ $permission->name }}</span>
                                @empty
                                    <span class="badge badge-danger bg-danger">No Permisos</span>
                                @endforelse
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <!-- <a href="#" class="btn btn-sm btn-twitter"> Editar </a> -->
                    </div>
                  </div>
                </div>
              </div>
              <!--end third-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
