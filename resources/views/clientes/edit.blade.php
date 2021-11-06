@extends('layouts.app')

@section('contenido')
<div class="container">

<form action="{{ url('/clientes/'.$clientes->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('clientes.form', ['modo'=> 'Editar']);
</form>

</div>
@endsection


