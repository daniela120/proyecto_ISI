<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class InventarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_Inventario_Index()
    {
        $Inventario = array(
            $NombreInventario=array('Granos de cafe','Pastelitos','Panes'),
            $Id_Categoria=array('1','3','4'),
            $CantidadStock=array('Paquetes de granos 100','paquetes','Paquetes'),
            $Descontinuado=array('0','0','0'),
            $Id_Proveedor=array('1','2','2'),
            $PrecioUnitario=array('45','25','46'),
            $StockMax=array('50','50','50'),
            $StockMin=array('10','10','10'),
            $StockActual=array('34','36','19')
        );

        $datos=$Inventario;
        $name=$NombreInventario;

        $this->assertContains($name, $Inventario, "testArray doesn't contains value as value");


        
    }

    public function test_a_InvantarioStore()
    {
        $Inventario = array(
            $NombreInventario=array('Granos de cafe','Pastelitos','Panes'),
            $Id_Categoria=array('1','3','4'),
            $CantidadStock=array('Paquetes de granos 100','paquetes','Paquetes'),
            $Descontinuado=array('0','0','0'),
            $Id_Proveedor=array('1','2','2'),
            $PrecioUnitario=array('45','25','46'),
            $StockMax=array('50','50','50'),
            $StockMin=array('10','10','10'),
            $StockActual=array('34','36','19')
        );

        $ayer = new Carbon('yesterday');
        $ayer=$ayer->format('Y-m-d');

        $InventarioHis=array(
            $id_Inventario=array('1','2','3'),
            $FechaInicio=array('2019-07-08','2019-07-08','2019-07-08'),
            $FechaFinal=array("","",''),
            $Precio=array(30,35,55)
            
        );

        array_push($NombreInventario, "Chocolate");
        array_push($Id_Categoria, "2");
        array_push($CantidadStock, "5 L");
        array_push($Descontinuado, "0");
        array_push($Id_Proveedor, "3");
        array_push($PrecioUnitario, "35");
        array_push($StockMax, "50");
        array_push($StockMin, "10");
        array_push($StockActual, "45");
        array_push($FechaInicio, $ayer);
        

        $name="Chocolate";
        $valor=$ayer;

        $this->assertContains($name, $NombreInventario, "testArray doesn't contains value as value");
        $this->assertContains($valor,$FechaInicio,"testArray doesn't contains value as value");
    }

    public function test_InventarioUpdate()
    {
        $hoy=Carbon::now();
        $hoy=$hoy->format('Y-m-d');

        $inventarios = array(
            $inventarios=array(['inventario' =>['Pastelitos' ]], ['PrecioUnitario'=>['45']]),

            $InventarioHis =array(['PrecioUnitario'=>'45'])
        );

        $ayer=new Carbon('yesterday');
        $ayer=$ayer->format('y-m-d');

        $InventarioHis=array(
            $inventarios=array(['inventario' =>['Pastelitos' ]], ['PrecioUnitario'=>['45']]),
            $FechaInicio=array('FechaInicio'=>'2021'),
            $FechaFinal=array('FechaInicio'=>''),
            $Precio=array('Precio'=>'46')
            
        );

        Arr::set($inventarios, 'inventario', "Chocolates");
        Arr::set($Precio,'Precio',46);
        Arr::set($FechaInicio,'FechaInicio',$hoy);
        Arr::set($FechaFinal,'FechaFinal',$ayer);

        $name=46;

        $this->assertContains($name, $Precio, "testArray doesn't contains value as value");

    }

    public function test_Inventario_Delete()
    {
         $Inventario=array(
            $info=[ 'NombreInventario'=>'Granos de cafe', 'Id_Categoria'=>'1','CantidadStock' =>'Paquetes de 100 granos', 'Descontinuado' => '0', 'Id_Proveedor' =>'1', 'PrecioUnitario'=>'45', 'StockMax'=>'50', 'StockMin'=>'10', 'StockActual'=>'34'],
         ); 

         $InventarioHis=array(
            $infoHis=['Id_Inventario'=>'1', 'Precio'=>'45', 'FechaInicio'=>'2020-07-24', 'FechaFinal'=>'2021-03-09'],
        );
 
        Arr::pull($info, 'NombreInventario');
        Arr::pull($info, 'Id_Categoria');
        Arr::pull($info, 'CantidadStock');
        Arr::pull($info, 'Descontinuado');
        Arr::pull($info, 'Id_Proveedor');
        Arr::pull($info, 'PrecioUnitario');
        Arr::pull($info, 'StockMax');
        Arr::pull($info, 'StockMin');
        Arr::pull($info, 'StockActual');
        
        Arr::pull($info, 'Id_Inventario');
        Arr::pull($infoHis, 'Precio');
        Arr::pull($infoHis, 'FechaInicio');
        Arr::pull($infoHis, 'FechaFinal');

        $this->assertEmpty($info,"Array is not empty");
    }
}
