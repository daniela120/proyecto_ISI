@extends('layouts.admin')

@section('contenido')
<h1>{{$modo}} empleado</h1>
@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
     <ul>
     @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
        @endforeach

     </ul>   
      
    </div>
    @endif

<div class="form-group">

<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre">

</div>

<div class="form-group">

<label for="Nombre">Apellido</label>
<input type="text"class="form-control" name="Apellido" value="{{isset($empleado->Apellido)?$empleado->Apellido:old('Apellido')}}" id="Apellido">

</div>

<div class="form-group">

<label for="Nombre">Fecha de nacimiento</label>
<input type="text" class="form-control" name="FechaNacimiento" value="{{isset($empleado->FechaNacimiento)?$empleado->FechaNacimiento:old('FechaNacimiento')}}" id="FechaNacimiento">

</div>

<div class="form-group">
<label for="Nombre">Fecha de contratacion</label>
<input type="text"  class="form-control" name="FechaContratacion" value="{{isset($empleado->FechaContratacion)?$empleado->FechaContratacion:old('FechaContratacion')}}"id="FechaContratacion">

</div>

<div class="form-group">
<label for="Nombre">Direccion</label>
<input type="text" class="form-control" name="Direccion" value="{{isset($empleado->Direccion)?$empleado->Direccion:old('Direccion')}}"id="Direccion">

</div>

<div class="form-group">
<label for="Nombre">Id Cargo</label>

<input type="text" class="form-control" name="Id_Cargo" value="{{isset($empleado->Id_Cargo)?$empleado->Id_Cargo:old('Id_Cargo')}}"id="Id_Cargo">

</div>

<div class="form-group">
<label for="Nombre">Telefono</label>
<input type="text" class="form-control" name="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}"id="Telefono">

</div>

<div class="form-group">
<label for="Nombre">Id Usuario</label>
<input type="text" class="form-control" name="Id_Usuario" value="{{isset($empleado->Id_Usuario)?$empleado->Id_Usuario:old('Id_Usuario')}}" id="Id_Usuario">

</div>

<div class="form-group">
<label for="Nombre">Id Documento</label>
<input type="text" class="form-control" name="Id_Documento" value="{{isset($empleado->Id_Documento)?$empleado->Id_Documento:old('Id_Documento')}}"id="Id_Documento">

</div>

<div class="form-group">
<label for="Nombre">Id turno</label>
<input type="text" class="form-control" name="Id_Turno" value="{{isset($empleado->Id_Turno)?$empleado->Id_Turno:old('Id_Turno')}}" id="Id_Turno">

</div>

<div class="form-group">
<label for="Nombre">Documento</label>
<input type="text" class="form-control" name="Documento" value="{{isset($empleado->Documento)?$empleado->Documento:old('Documento')}}" id="Documento">

</div>


<input class="btn btn-success"type="submit" class="form-control" value="{{$modo }} Datos">

<a class="btn btn-primary" href="{{url('/empleado') }}">Regresar</a>
<br>

@endsection
