<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PrecioInventarioHistoricoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_PrecioInventarioHistorico_Index()
    {

        $InventarioHis=array(
            $id_Inventario=array('1','2','3'),
            $FechaInicio=array('2019-07-08','2019-07-08','2019-07-08'),
            $FechaFinal=array("","",''),
            $Precio=array(30,35,55)
            
        
        );

        $datos=$InventarioHis;
        $name=$id_Inventario;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$InventarioHis,"testArray doesn't contains value as value");
    } 
}
