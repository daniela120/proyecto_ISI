<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class TipoPagoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexTipoPago()
    {
        $TiposDePagos=array(
            $NombreTipodePago=array('Efectivo','Tarjeta',"Mixto")
        );
        $datos=$TiposDePagos;
        $name=$NombreTipodePago;

        $this->assertContains($name,$TiposDePagos,"testArray doesn't contains value as value");
    }

    
    public function test_StoreTipoPago()
    {
        $TiposDePagos=array(
            $NombreTipodePago=array('Efectivo','Tarjeta')
        );
        array_push($NombreTipodePago, "Mixto");

        $name="Mixto";

        $this->assertContains($name,$NombreTipodePago,"testArray doesn't contains value as value");
    }

    public function test_UpdateTipoPago()
   {
       $TiposDePagos=array(
           $NombreTipodePago=array(['Efectivo'=>['Tarjeta'=>['Mixto']]])
       );
       Arr::set($NombreTipodePago,'Mixto','Pago Mixto');
       $name="Pago Mixto";

       $this->assertContains($name,$NombreTipodePago,"testArray doesn't contains value as value");
   }
 
   public function test_DeleteTipoPago()
   {
        $TipoPago=array(
            $info=[ 'NombreTipodePago'=>'Mixto'],
        ); 

        Arr::pull($info, 'NombreTipodePago');

        $this->assertEmpty($info,"Array is not empty");
   }
}

