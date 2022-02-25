<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class ISVTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_Isv_Index()
    {
        $Isv = array(
            $Descripcion = array('Diez por ciento', '15 por ciento'),
            $isv = array('0.10', '0.15')
        );
        $datos=$Isv;
        $name=$Descripcion;

        $this->assertContains($name, $Isv, "testArray doesn't contains value as value");
    
    }
   
    public function test_a_isv_Store()
    {
        $Isv = array(
            $Descripcion = array('Diez por ciento', '15 por ciento'),
            $Isv = array('0.10', '0.15')
        );

    array_push($Descripcion, "20 por ciento");
    array_push($Isv, "0.20");

    $name= "20 por ciento";

    $this->assertContains($name, $Descripcion, "testArray doesn't contains value as value");
    }
    public function test_IsvUpdate()
    {
        $Isv=array(
            $Isv=array(['Descripcion' => ['15 por ciento' =>['isv' => '0.12']]])
        );
        Arr::set($Isv, 'Descripcion', "12 por ciento");
        $name ="12 por ciento";

        $this->assertContains($name, $Isv,"testArray doesn't contains value as value");
    }
    public function test_Isv_Delete()
    {
         $Isv=array(
             $info=[ 'Descripcion'=>'Diez por ciento', 'Isv'=>'0.10'],
         ); 
 
         Arr::pull($info, 'Descripcion');
         Arr::pull($info, 'Isv');


         $this->assertEmpty($info,"Array is not empty");
    }
}
