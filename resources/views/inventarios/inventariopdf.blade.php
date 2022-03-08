<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Inventario</title>
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
            <h5>Reporte Inventario</h5>

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

                <table id="dt-inventario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center"><font size=0>Id </th>
                            <th class="text-center"><font size=0>Nombre Inventario</th>
                            <th class="text-center"><font size=0>Categoría</th>
                            <th class="text-center"><font size=0>Precio Unitario</th>
                            <th class="text-center"><font size=0>Cantidad Stock</th>
                            <th class="text-center"><font size=0>Stock Actual</th>
                            <th class="text-center"><font size=0>Stock Min</th>
                            <th class="text-center"><font size=0>Stock Max</th>
                            <th class="text-center"><font size=0>Proveedor</th>
                            <th class="text-center"><font size=0>Descontinuado</th>
                            
                            </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $inventarios)
                        <tr>
                           
                                <td><font size=0>{{$inventarios->id}}</td>
                                <td><font size=0>{{$inventarios->NombreInventario}}</td>
                                <td><font size=0>{{$inventarios->Categoria}}</td>
                                <td><font size=0>{{$inventarios->PrecioUnitario}}</td>
                                <td><font size=0>{{$inventarios->CantidadStock}}</td>
                                <td><font size=0>{{$inventarios->StockActual}}</td>
                                <td><font size=0>{{$inventarios->StockMin}}</td>
                                <td><font size=0>{{$inventarios->StockMax}}</td>
                                <td><font size=0>{{$inventarios->NombreCompania}}</td>
                                <td><font size=0>{{$inventarios->Descontinuado}}</td>
                               
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>



        </div>
    </div>
</body>
</html>
