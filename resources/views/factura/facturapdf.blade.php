<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte facturas</title>
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
            <h5>Reporte de facturas</h5>

        </div>
        <div>
        <p>Impreso por: {{ auth()->user()->name }} </p>
        </div>

        <div>
            <label for="fecha" class="form-fields">Fecha y Hora</label>
            <p>{{\Carbon\Carbon::parse($hoy)->format('d-m-Y h:i:s a')}}</p> 
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
                        
                            <th class="text-center">Id </th>
                            <th class="text-center">Empleado</th>
                            <th class="text-center">Fecha de factura</th>
                            <th class="text-center">Tipo Pago</th>
                            <th class="text-center">Cliente</th>                     
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($probando as $pedidos)
                        <tr>

                                <td>{{$pedidos->id}}</td>
                                <td>{{$pedidos->name}}</td>
                                <td>{{$pedidos->Fecha}}</td>
                                <td>{{$pedidos->Nombre_Tipo_Pago}}</td>
                                <td>{{$pedidos->Nombre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 790, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>    
</body>
</htm>
