@extends('layouts.admin')

@section('contenido')

<h1> {{$modo}} Cliente </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif



<div class="row mb-3">
    <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
            <label for="Nombre"> Nombre </label>
            <input type = "text" class="form-control" name ="Nombre" 
            value="{{ isset($clientes->Nombre)?$clientes->Nombre:old('Nombre') }}" id ="Nombre"> 
        </div>
    </div>    
    <div class="col-md-6">
        <div class="form-floating">
            <label for="Apellido"> Apellido </label>
            <input type = "text" class="form-control" name ="Apellido" 
            value="{{ isset($clientes->Apellido)?$clientes->Apellido:old('Apellido') }}" id ="Apellido">
        </div>
    </div>
</div>

<div class="form-floating mb-3">
    <label for="Usuario"> Usuario </label>
    <input type = "text" class="form-control" name ="Usuario" 
    value="{{ isset($clientes->Usuario)?$clientes->Usuario:old('Usuario') }}" id ="Usuario">
</div>

<div class="form-floating mb-3">
    <label for="Correo"> Correo </label>
    <input type = "text" class="form-control" name ="Correo" 
    value="{{ isset($clientes->Correo)?$clientes->Correo:old('Correo') }}" id ="Correo">
</div>

<div class="form-floating mb-3">
    <label for="Contraseña"> Contraseña </label>
    <input type = "Password" class="form-control" name ="Contraseña" 
    value="{{ isset($clientes->Contraseña)?$clientes->Contraseña:old('Contraseña') }}" id ="Contraseña">
</div>

<div class="form-floating mb-3">
    <label for="Direccion"> Direccion </label>
    <input type = "text" class="form-control" name ="Direccion" 
    value="{{ isset($clientes->Direccion)?$clientes->Direccion:old('Direccion') }}" id ="Direccion">
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
            <label for="Telefono"> Telefono </label>
            <input type = "numeric" class="form-control" name ="Telefono" 
            value="{{ isset($clientes->Telefono)?$clientes->Telefono:old('Telefono') }}" id ="Telefono">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
            <label for="FechaNacimiento"> Fecha Nacimiento </label>
            <input type = "date" class="form-control" name ="FechaNacimiento" 
            value="{{ isset($clientes->FechaNacimiento)?$clientes->FechaNacimiento:old('FechaNacimiento') }}" id ="FechaNacimiento">
        </div>
    </div>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">


<a class="btn btn-primary" href="{{ url('clientes') }}"> Regresar </a>

@endsection