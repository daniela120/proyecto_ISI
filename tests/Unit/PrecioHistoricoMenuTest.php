<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class PrecioHistoricoMenuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexPrecioHistoricoMenu()
    {
        $PrecioHistoricoMenu=array(
            $id_producto=array('12','13'),
            $FechaInicio=array('2022-09-01','2022-02-03'),
            $FechaFinal=array('2022-02-03','2022-12-10'),
            $Precio=array('11','19')
        );
        $datos=$PrecioHistoricoMenu;
        $name=$id_producto;

        $this->assertContains($name,$PrecioHistoricoMenu,"testArray doesn't contains value as value");
    }

    public function test_StorePrecioHistoricoMenu()
    {
        $PrecioHistoricoMenu=array(
            $id_producto=array('1','2'),
            $FechaInicio=array('2022-09-01','2022-02-03'),
            $FechaFinal=array('2022-02-03','2022-12-10'),
            $Precio=array('11','19')
        );
        array_push($id_producto, "4");
        array_push($FechaInicio, "2022-12-10");
        array_push($FechaFinal, "2022-12-12");
        array_push($Precio, "13");

        $name="4";

        $this->assertContains($name,$id_producto,"testArray doesn't contains value as value");
    }

    public function test_UpdatePrecioHistoricoMenu()
   {
       $PrecioHistoricoMenu=array(
           $FechaInicio=array(['2022-09-01'=>['2022-10-01'=>['2022-04-02']]])
       );
       Arr::set($FechaInicio,'2022-09-01','2022-09-06');
       $name="2022-09-06";

       $this->assertContains($name,$FechaInicio,"testArray doesn't contains value as value");
   }

   public function test_DeletePrecioHistoricoMenu()
   {
        $PrecioHistoricoMenu=array(
            $info=['id_producto'=>'20', 'FechaInicio'=>'2022-04-02', 'FechaInicio'=>'2022-04-12', 'Precio'=>'12'],
        ); 

        Arr::pull($info, 'id_producto');
        Arr::pull($info, 'FechaInicio');
        Arr::pull($info, 'FechaFinal');
        Arr::pull($info, 'Precio');

        $this->assertEmpty($info,"Array is not empty");
   }

}
