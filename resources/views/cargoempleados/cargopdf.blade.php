<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Cargos</title>
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
            <h5>Reporte Cargos</h5>

        </div>
        <div>
        <p>Impreso por: {{ auth()->user()->name }} </p>
        </div>

        <div>
            <label for="fecha" class="form-fields">Fecha y Hora</label>
            <p>{{\Carbon\Carbon::parse($hoy)->format('d/m/Y h:i:s a')}}</p> 
        </div>

        <div>
            <label for="Direccion" class="form-fields">Dirección</label>
            <p>Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101</p> 
        </div>
    </div>
<div>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            
                        <th class="text-center">Id </th>
                            <th class="text-center">Cargo</th>        
                            <th class="text-center">Salario</th>               
                                    
                            <th class="text-center">Descripción</th>            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($cargoempleados as $cargoempleados)
                        <tr>
                            
                            <td>{{$cargoempleados->id}}</td>
                            <td>{{$cargoempleados->Cargo}}</td>
                            <td>{{$cargoempleados->Salario}}</td>
                            <td>{{$cargoempleados->Descripcion}}</td>
                              
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>



        </div>
    </div>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 790, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>  
</body>
</html>
