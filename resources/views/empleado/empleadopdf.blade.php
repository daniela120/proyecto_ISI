<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Empleados</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{public_path('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <style>

.der {
  float: right;
}
.principal{
 
    height:auto; 
}


</style>
</head>
<body>
<div>
    <div class="der">
        <a> 
            <img class="logo" style="float" src="assets\img\logo-coffee.png" alt="Coffe" 
            width="170" height="170"/>
            
        </a>
    </div>

    
    <div>  
        <div>
            <h4>Mr. Coffee</h4>

        </div>
        <div>
            <h5>Reporte Empleados</h5>

        </div>
        <div>
        <p>Impreso por: {{ auth()->user()->name }} </p>
        </div>

        <div>
            <label for="fecha" class="form-fields">Fecha y Hora</label>
            <p>{{\Carbon\Carbon::parse($hoy)->format('d M y h:i a')}}</p> 
        </div>

        <div>
            <label for="Direccion" class="form-fields">Dirección</label>
            <p>Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101</p> 
        </div>
    </div>


    <div class="principal">

                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            
                        <th class="text-center"><font size=0>Id </th>
                            <th class="text-center"><font size=0>Nombre</th>
                            <th class="text-center"><font size=0>Apellido</th>
                            <th class="text-center"><font size=0>Fecha de Nacimiento</th>
                            <th class="text-center"><font size=0>Fecha de Contratación</th>                            
                            <th class="text-center"><font size=0>Cargo</th>
                            <th class="text-center"> <font size=0>Teléfono</th>
                            <th class="text-center"><font size=0>Usuario</th>
                            <th class="text-center"><font size=0>Turno</th>                                                     
                            <th class="text-center"><font size=0>Documento</th>
                            <th class="text-center"><font size=0>Tipo Doc</th>  
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $empleado)
                        <tr>
                           
                                <td><font size=0>{{$empleado->id}}</td>
                                <td><font size=0>{{$empleado->Nombre}}</td>
                                <td><font size=0>{{$empleado->Apellido}}</td>
                                <td><font size=0>{{$empleado->FechaNacimiento}}</td>
                                <td><font size=0>{{$empleado->FechaContratacion}}</td>
                                
                                <td><font size=0>{{$empleado->Cargo}}</td>
                                <td><font size=0>{{$empleado->Telefono}}</td>
                                <td><font size=0>{{$empleado->name}}</td>
                                <td><font size=0>{{$empleado->TipoTurno}}</td>
                                                               
                                <td><font size=0>{{$empleado->Documento}}</td>
                                <td><font size=0>{{$empleado->TipoDocumento}}</td>
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>



        </div>
    </div>
</body>
</html>
