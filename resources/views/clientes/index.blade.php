@extends('layouts.admin')

@section('contenido')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dimissible" role="alert">
{{ Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
    @endif




<a href="{{ url('clientes/create') }}" class="btn btn-success"> Registrar nuevo Cliente </a>
<br>
<br>
<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Fecha Nacimiento</th>
        </tr>
    </thead>

    <tbody>
        @Foreach( $cliente as $clientes )
        <tr>
            <td>{{ $clientes->id }}</td>
            <td>{{ $clientes->Nombre }}</td>
            <td>{{ $clientes->Apellido }}</td>
            <td>{{ $clientes->Usuario }}</td>
            <td>{{ $clientes->Correo }}</td>
            <td>{{ $clientes->Contraseña }}</td>
            <td>{{ $clientes->Direccion }}</td>
            <td>{{ $clientes->Telefono }}</td>
            <td>{{ $clientes->FechaNacimiento }}</td>
            <td> 
            
            <a href="{{ url('/clientes/'.$clientes->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>
             
            
            
            <form action="{{ url('/clientes/'.$clientes->id) }}" class="d-inline" method="post">    
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"  
                value="Borrar">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $cliente->links() !!}
</div>
@endsection