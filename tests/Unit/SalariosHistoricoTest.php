<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SalariosHistoricoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_exampleIndex()
    {

        $SalarioHistorico=array(
            $Cargos=array('Admin','Cocinero','Aseador'),
            $Descripcion=array("Gestiona","Cocina",'Asea'),
            $Salario=array(15000,12000,9000)
   
        );

        $datos=$SalarioHistorico;
        $name=$Cargos;
        $nameD=$Descripcion;
        $nameS=$Salario;
       
        $this->assertContains($name,$SalarioHistorico,"testArray doesn't contains value as value");
        $this->assertContains($nameD,$SalarioHistorico,"testArray doesn't contains value as value");
        $this->assertContains($nameS,$SalarioHistorico,"testArray doesn't contains value as value");
    
    
    } 
}
