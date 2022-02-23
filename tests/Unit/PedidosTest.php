<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class PedidosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexPedidos()
    {
        $Pedidos=array(
            $id_usuario=array('12','13'),
            $Fecha=array('2022-09-01','2022-02-03'),
            $id_tipo_de_pago=array('02','04'),
            $id_cliente=array('11','09')
        );
        $datos=$Pedidos;
        $name=$id_usuario;

        $this->assertContains($name,$Pedidos,"testArray doesn't contains value as value");
    }

    public function test_StorePedidos()
    {
        $Pedidos=array(
            $id_usuario=array('4','2'),
            $Fecha=array('2022-09-01','2022-02-03'),
            $id_tipo_de_pago=array('09','06'),
            $id_cliente=array('11','02')
        );
        array_push($id_usuario, "4");
        array_push($Fecha, "2022-12-02");
        array_push($id_tipo_de_pago, "08");
        array_push($id_cliente, "13");

        $name="4";

        $this->assertContains($name,$id_usuario,"testArray doesn't contains value as value");
    }

    public function test_UpdatePedidos()
   {
       $Pedidos=array(
           $Fecha=array(['2022-09-01'=>['2022-10-01'=>['2022-04-02']]])
       );
       Arr::set($Fecha,'2022-09-01','2022-09-06');
       $name="2022-09-06";

       $this->assertContains($name,$Fecha,"testArray doesn't contains value as value");
   }

   public function test_DeletePedidos()
   {
        $Pedidos=array(
            $info=['id_usuario'=>'20', 'Fecha'=>'2022-04-02', 'id_tipo_de_pago'=>'12', 'id_cliente'=>'12'],
        ); 

        Arr::pull($info, 'id_usuario');
        Arr::pull($info, 'Fecha');
        Arr::pull($info, 'id_tipo_de_pago');
        Arr::pull($info, 'id_cliente');

        $this->assertEmpty($info,"Array is not empty");
   }

}
