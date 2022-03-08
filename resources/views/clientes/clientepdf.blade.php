<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Clientes</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{public_path('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <style>

.der {
  float: right;
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
            <h5>Reporte Clientes</h5>

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
<div>
    <table id="dt-cliente" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center"><font size=2>Id </th>
                            <th class="text-center"><font size=2>Nombre</th>                      
                            <th class="text-center"><font size=2>Apellido</th>
                            <th class="text-center"><font size=2>Usuario</th>   
                            <th class="text-center">Dirección</th>   
                            <th class="text-center">Teléfono</th>   
                            <th class="text-center">Fecha Nacimiento</th>      
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($probando as $clientes)
                        <tr>
                            <td><font size=2>{{ $clientes->id }}</td>
                            <td><font size=2>{{ $clientes->Nombre }}</td>
                            <td><font size=2>{{ $clientes->Apellido }}</td>
                            <td><font size=2>{{ $clientes->name }}</td>
                            <td><font size=2>{{ $clientes->Direccion }}</td>
                            <td><font size=2>{{ $clientes->Telefono }}</td>
                            <td><font size=2>{{ $clientes->FechaNacimiento }}</td>      
                        </tr>
                        @endforeach
                    </tbody>
                </table>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>   
</body>
</htm>
