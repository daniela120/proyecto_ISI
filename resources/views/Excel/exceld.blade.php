
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
                        <th class="text-center" style="background-color:#A9D0F5"><b><h1>MR. COFFEE</h1></b> </th>
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
                   </tr> 

                    <tr>
                         <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th>  
                       <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th>
                       <th style="background-color:#ffffff"> </th>                      
                    </tr>

                    <tr>
                         <th style="background-color:#ffffff"> </th>
                        <th style="background-color:#ffffff"><p>Direcci??n:  <br>Colonia Humuya, Avenida Altiplano, <br> Calle Poseid??n, 11101</p> </th>         
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
                    </tr>


                    <tr>
                    
                        <th style="background-color:#ffffff"> </th>  
                        <th style="background-color:#ffffff"> Reporte generado por:</th>  
                          
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
                    </tr>

                    <tr>
                         <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th>  
                       <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th> 
                       <th style="background-color:#ffffff"> </th>
                       <th style="background-color:#ffffff"> </th>                            
                    </tr>


<thead>
                    <tr>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th class="text-center" style="background-color:#A9D0F5"><b><h4>PROVEEDORES</h4></b> </th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                        <th style="background-color:#A9D0F5"></th>
                    </tr>
                    <tr>
                        
                            <th class="text-center"  style="background-color:#ffe599">Id </th>
                            <th class="text-center"  style="background-color:#ffe599">Nombre Compa??ia</th>                      
                            <th class="text-center"  style="background-color:#ffe599">Nombre Contacto</th>  
                            <th class="text-center"  style="background-color:#ffe599">Tel??fono</th>  
                            <th class="text-center"  style="background-color:#ffe599">Sitio Web</th>  
                            <th class="text-center"  style="background-color:#ffe599">Direcci??n</th>   
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($proveedores as $Proveedores)
                        <tr>
                        
                            <td style="background-color:#ffffff">{{$Proveedores->id}}</td>
                            <td style="background-color:#ffffff">{{$Proveedores->NombreCompania}}</td>
                            <td style="background-color:#ffffff">{{$Proveedores->NombreContacto}}</td> 
                            <td style="background-color:#ffffff">{{$Proveedores->Telefono}}</td> 
                            <td style="background-color:#ffffff">{{$Proveedores->SitioWeb}}</td>   
                            <td style="background-color:#ffffff">{{$Proveedores->Direccion}}</td>     
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </body>
</html>