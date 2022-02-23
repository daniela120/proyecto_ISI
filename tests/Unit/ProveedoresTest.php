<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Support\Arr;


class ProveedoresTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexProveedores()
    {
        $Proveedores=array(
            $NombreCompania=array('Nestle','Inverfast'),
            $NombreContacto=array('Sarah','Iveth'),
            $Telefono=array('99800654','87321256'),
            $SitioWeb=array('nestle.com','inverfast.com'),
            $Direccion=array('Frente Registro nacional, Plaza Criolla','Plaza Cortes')
        );
        $datos=$Proveedores;
        $name=$NombreCompania;

        $this->assertContains($name,$Proveedores,"testArray doesn't contains value as value");
    }
    
    
    public function test_StoreProveedores()
    {
        $Proveedores=array(
            $NombreCompania=array('Nestle','Inverfast'),
            $NombreContacto=array('Sarah','Iveth'),
            $Telefono=array('99800654','87321256'),
            $SitioWeb=array('nestle.com','inverfast.com'),
            $Direccion=array('Frente Registro nacional, Plaza Criolla','Plaza Cortes')
        );
        array_push($NombreCompania, "CafeMaya");
        array_push($NombreContacto, "Sofia");
        array_push($Telefono, "88912134");
        array_push($SitioWeb, "cafemaya.com");
        array_push($Direccion, "Plaza Central");

        $name="CafeMaya";

        $this->assertContains($name,$NombreCompania,"testArray doesn't contains value as value");
    }

    public function test_UpdateProveedores()
   {
       $Proveedores=array(
           $NombreProducto=array(['Granita de mora'=>['Late'=>['Chocolate']]])
       );
       Arr::set($NombreProducto,'Granita de mora','Granita de mango');
       $name="Granita de mango";

       $this->assertContains($name,$NombreProducto,"testArray doesn't contains value as value");
   }

   
   public function test_DeleteProveedores()
   {
        $Proveedores=array(
            $info=['NombreCompania'=>'CafeMaya', 'NombreContacto'=>'Martha', 'Telefono'=>'98201312', 'SitioWeb'=>'cafemaya.com', 'Direccion'=>'Plaza Central'],
        ); 

        Arr::pull($info, 'NombreCompania');
        Arr::pull($info, 'NombreContacto');
        Arr::pull($info, 'Telefono');
        Arr::pull($info, 'SitioWeb');
        Arr::pull($info, 'Direccion');

        $this->assertEmpty($info,"Array is not empty");
   }

}

