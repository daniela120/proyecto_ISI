<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;


class ClienteTest extends TestCase
{
    
    public function test_a_cliente_Index()
    {
        $clientes = array(
            $Nombre=array('Nombre1','Nombre2','NOmbre3'),
            $Apellido=array('Apellido1','Apellido2','Apellido3'),
            $Id_Usuario=array('Eduar','Kike','Miguel'),
            $Direccion=array('Miraflores','Loarque','Centroamerica'),
            $Telefono=array('21234756','98782134','87462311'),
            $FechaNacimiento=array('21/02/1990','04/11/1985','01/07/1989')
        );

        $datos=$clientes;
        $name=$Nombre;

        $this->assertContains($name, $clientes, "testArray doesn't contains value as value");


        
    }

    public function test_a_clienteStore()
    {
        $clientes = array(
            $Nombre=array('Nombre1','Nombre2','Nombre3'),
            $Apellido=array('Apellido1','Apellido2','Apellido3'),
            $Id_Usuario=array('Eduar','Kike','Miguel'),
            $Direccion=array('Miraflores','Loarque','Centroamerica'),
            $Telefono=array('21234756','98782134','87462311'),
            $FechaNacimiento=array('21/02/1990','04/11/1985','01/07/1989')
        );

        array_push($Nombre, "Juan");
        array_push($Apellido, "Gonsalez");
        array_push($Id_Usuario, "Juan1");
        array_push($Direccion, "flores");
        array_push($Telefono, "21238756");
        array_push($FechaNacimiento, "21/02/1993");

        $name="Juan";

        $this->assertContains($name, $Nombre, "testArray doesn't contains value as value");
    }

    public function test_clientesUpdate()
    {
        $clientes=array(
            $clientes=array(['Cliente' =>['Nombre2' ]])
        );

        Arr::set($clientes, 'Cliente', "Javier");

        $name="Javier";

        $this->assertContains($name, $clientes, "testArray doesn't contains value as value");

    }

    /*public function test_clientesDelete()
    {
        $clientes = 'test data';

        $this->assertEmpty(
            $clientes,
            "data holder is not empty"
        );
    }*/

}
