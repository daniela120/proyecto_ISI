<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class ProductosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexProductos()
    {
        $Productos=array(
            $NombreProducto=array('Granita de mora','Late',"postre"),
            $Descripcion=array('Bebida de mora helada','Bebida caliente'),
            $id_Categoria=array('1','2'),
            $Precio=array('55','65')
        );
        $datos=$Productos;
        $name=$NombreProducto;

        $this->assertContains($name,$Productos,"testArray doesn't contains value as value");
    }

    
    public function test_StoreProductos()
    {
        $Productos=array(
            $NombreProducto=array('Granita de mora','Late'),
            $Descripcion=array('Bebida de mora helada','Bebida caliente'),
            $id_Categoria=array('1','2'),
            $Precio=array('55','65')
        );

        $ayer=new Carbon('yesterday');
        $ayer=$ayer->format('y-m-d');

        $PrecioHistoricoMenu=array(
            $NombreProducto=array('Granita de mora','Late'),
            $FechaInicio=array('2022-09-01','2022-02-03'),
            $FechaFinal=array('',''),
            $Precio=array('55','19')
        );

        array_push($NombreProducto, "Granita de cafe");
        array_push($Descripcion, "Bebida de cafe helada");
        array_push($id_Categoria, "2");
        array_push($Precio, "56");
        array_push($FechaInicio, $ayer);

        $name="Granita de cafe";
        $valor=$ayer;

        $this->assertContains($name,$NombreProducto,"testArray doesn't contains value as value");
        $this->assertContains($valor,$FechaInicio,"testArray doesn't contains value as value");
    }
    
    
   public function test_UpdateProductos()
   {

    $hoy=Carbon::now();
    $hoy=$hoy->format('Y-m-d');

       $Productos=array(
           $Producto=array(['NombreProducto'=>['Granita de mora'=>['Descripcion'=>'Bebida de mora']]],['Precio'=>['60']]),

           $PrecioHistoricoMenu=array(['Precio'=>'60'])
       );

       $ayer=new Carbon('yesterday');
        $ayer=$ayer->format('y-m-d');

        $PrecioHistoricoMenu=array(
            $Producto=array(['NombreProducto'=>['Granita de mora'=>['Descripcion'=>'Bebida de mora']]],['Precio'=>['60']]),
            $FechaInicio=array(['FechaInicio'=>'2020']),
            $FechaFinal=array(['FechaFinal'=>'']),
            $Precio=array(['Precio'=>'90'])
        );

       Arr::set($Producto,'NombreProducto','Granita de mango');
       Arr::set($Precio,'Precio',90);
       Arr::set($FechaInicio,'FechaInicio',$hoy);
       Arr::set($FechaFinal,'FechaFinal',$ayer);
       $name=90;

       $this->assertContains($name,$Precio,"testArray doesn't contains value as value");
   }

   
   public function test_DeleteProductos()
   {
        $Productos=array(
            $info=['NombreProducto'=>'Chocolate', 'Descripcion'=>'Bebida Chocolate', 'id_Categoria'=>'2', 'Precio'=>'77'],
        ); 

        $PrecioHistoricoMenu=array(
            $infoH=['NombreProducto'=>'Chocolate', 'Precio'=>'77', 'FechaInicio'=>'2019-02-04', 'FechaFinal'=>'2021-01-09'],
        );

        Arr::pull($info, 'NombreProducto');
        Arr::pull($info, 'Descripcion');
        Arr::pull($info, 'id_Categoria');
        Arr::pull($info, 'Precio');

        Arr::pull($info, 'NombreProducto');
        Arr::pull($infoH, 'Precio');
        Arr::pull($infoH, 'FechaInicio');
        Arr::pull($infoH, 'FechaFinal');

        $this->assertEmpty($info,"Array is not empty");
   }

}
