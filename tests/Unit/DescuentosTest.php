<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class DescuentosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
        public function test_a_Descuento_Index()
        {
            $Descuentos = array(
                $Descripcion = array('Diez por ciento', '15 por ciento'),
                $ValorDescuento = array('0.10', '0.15')
            );
            $datos=$Descuentos;
            $name=$Descripcion;

            $this->assertContains($name, $Descuentos, "testArray doesn't contains value as value");
        
        }
       
        public function test_a_Descuento_Store()
        {
            $Descuentos = array(
                $Descripcion = array('Diez por ciento', '15 por ciento'),
                $ValorDescuento = array('0.10', '0.15')
            );

        array_push($Descripcion, "20 por ciento");
        array_push($ValorDescuento, "0.20");

        $name= "20 por ciento";

        $this->assertContains($name, $Descripcion, "testArray doesn't contains value as value");
        }
        public function test_DescuentosUpdate()
        {
            $Descuentos=array(
                $Descuentos=array(['Descuento' => ['15 por ciento' =>['ValorDescuento' => '0.12']]])
            );
            Arr::set($Descuentos, 'Descuento', "12 por ciento");
            $name ="12 por ciento";

            $this->assertContains($name, $Descuentos,"testArray doesn't contains value as value");
        }

        public function test_Descuento_Delete()
    {
         $Descuentos=array(
             $info=[ 'Descripcion'=>'Diez por ciento', 'ValorDescuento'=>'0.10'],
         ); 
 
         Arr::pull($info, 'Descripcion');
         Arr::pull($info, 'ValorDescuento');


         $this->assertEmpty($info,"Array is not empty");
    }
}
