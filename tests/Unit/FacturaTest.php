<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class FacturaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_exampleIndex()
    {

       /** 
        $arreglo=array("Tipo documento"=>"RTN", "Descripcion" =>"registro tributario");
        $arreglo1=array("Tipo documento"=>"Identificacion", "Descripcion"=> "documento de identificacion");
        $name = "documento de identificacion";
        array_push($arreglo, "documento de identificacion");
        */


        $DatosFactura=array(
            $NumFactura=array('23456789','23456790','23456791'),
            $FechaFactura=array("2022-01-07","2022-01-09",'2022-01-08'),
            $Direccion=array('Las Casitas','Los Hidalgos','Kennedy'),
            $PedidoId=array(2,3,4),
            $Parametrofac=array(1,1,1),
            $Empleados=array('Angel','Daniel','Juan'),
            $Productos=array('Cafe','Sandwich','Smoothie'),
            $TiposdePago=array(1,2,3),
            $Clientes=array('Angela','Daniela','Juana'),
            $Descuento=array(1,2,3),
            $Isv=array(15,10,5),

        
        
        );

        $datos=$DatosFactura;
        $name=$NumFactura;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$datos,"testArray doesn't contains value as value");
    } 

    public function test_exampleStore()
    {

        $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');
        //$array1=Arr::add(['' => ''], '', '');
        //$array1=Arr::add(['name' => 'Php'], 'Laravel', 100);
        //$array1=Arr::add(['name' => 'Python'], 'Laravel', 60);
        $DatosFactura=array(
            $NumFactura=array('23456789','23456790','23456791'),
            $FechaFactura=array("2022-01-07","2022-01-09",'2022-01-08'),
            $Direccion=array('Las Casitas','Los Hidalgos','Kennedy'),
            $PedidoId=array(2,3,4),
            $Parametrofac=array(1,1,1)
        
        
        );

        //$arreglo1=array("Tipo documento"=>"Identificacion", "Descripcion"=> "documento de identificacion");
        //$name = "documento de identificacion";
        array_push($NumFactura, '23456792');
        array_push($FechaFactura, $hoy);
        array_push($Direccion, 'Las Uvas');
        array_push($PedidoId, 5);
        array_push($Parametrofac, 1);
        

        $name='23456792';
        $name2=$hoy;
        

        
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$NumFactura,"testArray doesn't contains value as value");
        $this->assertContains($name2,$FechaFactura,"testArray doesn't contains value as value");
       
    } 




    /**

     $DetallePedidos=array(
            $info=['Pedidos_Id'=>'20', 'Id_Producto'=>'02', 'PrecioUnitario'=>'12', 'Cantidad'=>'12', 'id_descuento'=>'09', 'id_isv'=>'19', 'Total'=>'02'],
        ); 

        $subtotal=($detallepedido->Precio*$detallepedido->Cantidad );                
                $sumadescuento=($detallepedido->Precio*$detallepedido->Cantidad)*$detallepedido->ValorDescuento;
                $suma=(($detallepedido->Precio*$detallepedido->Cantidad )-(($detallepedido->Precio*$detallepedido->Cantidad )*($detallepedido->ValorDescuento)))*$detallepedido->isv;
                $acumimpuesto=$acumimpuesto+$suma;
                $subtotalpedido=$subtotalpedido+$subtotal;
                $acumdescuento=$acumdescuento+$sumadescuento;
    */

    public function test_examplePdf()
    {

        $DetallePedidos=array(
            $info=['Pedidos_Id'=>'20', 'Id_Producto'=>'02', 'PrecioUnitario'=>12, 'Cantidad'=>5, 'id_descuento'=>0.10, 'id_isv'=>0.15, 'Total'=>'Sindefinir'],
        ); 

        $Precio=Arr::get($info,'PrecioUnitario');
        $Cantidad=Arr::get($info,'Cantidad');
        $Descuento=Arr::get($info,'id_descuento');
        $Isv=Arr::get($info,'id_isv');


      
        $subtotal=($Precio*$Cantidad );                
                $sumadescuento=($Precio*$Cantidad)*$Descuento;
                $sumaimpuesto=($subtotal -$sumadescuento)*$Isv;
                
                $Total=($subtotal-$sumadescuento)+$sumaimpuesto;
        //$Total=2;
       //$datos=2;

        $datos=62.1;
        print_r($Total);
        
        $this->assertEquals($datos,$Total);
        
    } 

    public function test_exampleShow()
    {

       /** 
        $arreglo=array("Tipo documento"=>"RTN", "Descripcion" =>"registro tributario");
        $arreglo1=array("Tipo documento"=>"Identificacion", "Descripcion"=> "documento de identificacion");
        $name = "documento de identificacion";
        array_push($arreglo, "documento de identificacion");
        */


        $DatosFactura=array(
            $NumFactura=array('23456789'),
            $FechaFactura=array("2022-01-07"),
            $Direccion=array('Las Casitas'),
            $PedidoId=array(2),
            $Parametrofac=array(1),
            $Empleados=array('Angel'),
            $Productos=array('Cafe'),
            $TiposdePago=array(1),
            $Clientes=array('Angela'),
            $Descuento=array(1),
            $Isv=array(15),

        
        
        );

        $DetallePedidos=array(
            $info=['Pedidos_Id'=>'20', 'Id_Producto'=>'02', 'PrecioUnitario'=>12, 'Cantidad'=>5, 'id_descuento'=>0.10, 'id_isv'=>0.15, 'Total'=>'Sindefinir'],
        ); 

        $Precio=Arr::get($info,'PrecioUnitario');
        $Cantidad=Arr::get($info,'Cantidad');
        $Descuento=Arr::get($info,'id_descuento');
        $Isv=Arr::get($info,'id_isv');


      
                $subtotal=($Precio*$Cantidad );                
                $sumadescuento=($Precio*$Cantidad)*$Descuento;
                $sumaimpuesto=($subtotal -$sumadescuento)*$Isv;
                $Total=($subtotal-$sumadescuento)+$sumaimpuesto;

        $CalculosFactura=array($subtotal,$sumadescuento,$sumaimpuesto,$Total);        



        $datos=$DatosFactura;
        $name=$NumFactura;
        $name2=$info;
        $calculo=$subtotal;

        $unionShow=Arr::collapse([$DatosFactura,$DetallePedidos,$CalculosFactura]);
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$unionShow,"testArray doesn't contains value as value");
        $this->assertContains($name2,$unionShow,"testArray doesn't contains value as value");
        $this->assertContains($calculo,$unionShow,"testArray doesn't contains value as value");
    
    
    } 



}
