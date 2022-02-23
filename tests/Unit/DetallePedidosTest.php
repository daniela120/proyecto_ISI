<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class DetallePedidosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexDetallePedidos()
    {
        $DetallePedido=array(
            $Pedidos_Id=array('2','2'),
            $Id_Producto=array('1','2'),
            $PrecioUnitario=array('50','70'),
            $Cantidad=array('3','4'),
            $id_descuento=array('2','1'),
            $id_isv=array('3','1'),
            $Total=array('150','280')
        );
        $datos=$DetallePedido;
        $name=$Pedidos_Id;

        $this->assertContains($name,$DetallePedido,"testArray doesn't contains value as value");
    }

    public function test_StoreDetallePedidos()
    {
        $DetallePedido=array(
            $Pedidos_Id=array('2','2'),
            $Id_Producto=array('1','2'),
            $PrecioUnitario=array('50','70'),
            $Cantidad=array('3','4'),
            $id_descuento=array('2','1'),
            $id_isv=array('3','1'),
            $Total=array('150','280')
        );
        array_push($Pedidos_Id, "4");
        array_push($Id_Producto, "2");
        array_push($PrecioUnitario, "16");
        array_push($Cantidad, "2");
        array_push($id_descuento, "1");
        array_push($id_isv, "3");
        array_push($Total, "32");

        $name="4";

        $this->assertContains($name,$Pedidos_Id,"testArray doesn't contains value as value");
    }

    public function test_UpdateDetallePedidos()
   {
       $DetallePedidos=array(
           $Pedidos_Id=array(['3'=>['2'=>['4']]])
       );
       Arr::set($Pedidos_Id,'4','5');
       $name="5";

       $this->assertContains($name,$Pedidos_Id,"testArray doesn't contains value as value");
   }

   public function test_DeleteDetallePedidos()
   {
        $DetallePedidos=array(
            $info=['Pedidos_Id'=>'20', 'Id_Producto'=>'02', 'PrecioUnitario'=>'12', 'Cantidad'=>'12', 'id_descuento'=>'09', 'id_isv'=>'19', 'Total'=>'02'],
        ); 

        Arr::pull($info, 'Pedidos_Id');
        Arr::pull($info, 'Id_Producto');
        Arr::pull($info, 'PrecioUnitario');
        Arr::pull($info, 'Cantidad');
        Arr::pull($info, 'id_descuento');
        Arr::pull($info, 'id_isv');
        Arr::pull($info, 'Total');

        $this->assertEmpty($info,"Array is not empty");
   }
}
