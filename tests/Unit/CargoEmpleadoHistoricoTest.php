<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CargoEmpleadoHistoricoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_exampleIndex()
    {

        $SalarioH=array(
            $Cargos=array('Admin','Cocinero','Aseador'),
            $FechaInicio=array('2019-07-08','2019-07-08','2019-07-08'),
            $FechaFinal=array("","",''),
            $Salario=array(15000,12000,9000)
            
        
        );

        $datos=$SalarioH;
        $name=$Cargos;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$SalarioH,"testArray doesn't contains value as value");
    } 
}
