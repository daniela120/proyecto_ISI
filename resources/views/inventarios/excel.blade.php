
    <!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{public_path('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
 
<table id="dt-Empleados" class="table table-stripped table-bordered dts">
                    
<thead style="background-color:#A9D0F5">
                    <tr>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th class="text-center" style="background-color:#A9D0F5"><b><h1>MR. COFFEE</h1></b> </th>                  
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                    </tr>
                    </thead>

                    <tr>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff">Fecha y Hora:  <br>  {{\Carbon\Carbon::parse($hoy)->format('d M y h:i a')}}</th> 
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>  
                        <th style="background-color:#ffffff"> </th>
                   </tr> 

                    <tr>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th> 
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>
                         <th style="background-color:#ffffff"> </th>                       
                    </tr>

                    <tr>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"><p>Dirección:  <br>Colonia Humuya, Avenida Altiplano, <br> Calle Poseidón, 11101</p> </th>  
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>  
                        <th style="background-color:#ffffff"> </th>
                   </tr> 
                  

                    <tr>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>                        
                    </tr>

                    <tr>
                        <th style="background-color:#ffffff"> </th> 
                        <th style="background-color:#ffffff"> Reporte generado por:</th>  
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>  
                        <th style="background-color:#ffffff"> </th>
                    </tr>

                    <tr>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>  </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"> </th>  
                        <th style="background-color:#ffffff"> </th>
                   </tr> 

                    <tr>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>                       
                    </tr>
<thead>
                    <tr>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th class="text-center" style="background-color:#A9D0F5"><b><h4>INVENTARIO</h4></b> </th>
                        
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        
                    </tr>
                    <tr>
                            <th class="text-center" style="background-color:#ffe599">Id </th>
                            <th class="text-center" style="background-color:#ffe599">Nombre Inventario</th>
                            <th class="text-center" style="background-color:#ffe599">Categoría</th>
                            <th class="text-center" style="background-color:#ffe599">Precio Unitario</th>
                            <th class="text-center" style="background-color:#ffe599">Cantidad Stock</th>
                            <th class="text-center" style="background-color:#ffe599">Stock Actual</th>
                            <th class="text-center" style="background-color:#ffe599">Stock Min</th>
                            <th class="text-center" style="background-color:#ffe599">Stock Max</th>
                            <th class="text-center" style="background-color:#ffe599">Proveedor</th>
                            <th class="text-center" style="background-color:#ffe599">Descontinuado</th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($probando as $inventario)
                        <tr>
                                <td style="background-color:#ffffff">{{$inventario->id}}</td>
                                <td style="background-color:#ffffff">{{$inventario->NombreInventario}}</td>
                                <td style="background-color:#ffffff">{{$inventario->Categoria}}</td>
                                <td style="background-color:#ffffff">{{$inventario->PrecioUnitario}}</td>
                                <td style="background-color:#ffffff">{{$inventario->CantidadStock}}</td>
                                <td style="background-color:#ffffff">{{$inventario->StockActual}}</td>
                                <td style="background-color:#ffffff">{{$inventario->StockMin}}</td>
                                <td style="background-color:#ffffff">{{$inventario->StockMax}}</td>
                                <td style="background-color:#ffffff">{{$inventario->NombreCompania}}</td>
                                <td style="background-color:#ffffff">{{$inventario->Descontinuado}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </body>
</html>