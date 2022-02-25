<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class EstadoEnviosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_EstadoEnvios_Index()
    {
        $EstadoEnvios = array(
            $Nombre_Estado=array('Pendiente','Entregado')
        );
        $datos = $EstadoEnvios;
        $name = $Nombre_Estado;
        
        $this->assertContains($name, $EstadoEnvios,"testArray doesn't contains value as value");
    }

    public function test_a_EstadoEnvios_Store()
    {
        $EstadoEnvios = array(
            $Nombre_Estado=array('Pendiente','Entregado')
        );
        array_push($Nombre_Estado, "Enviado");

        $name="Enviado";

        $this->assertContains($name, $Nombre_Estado, "testArray doesn't contains value as value");
    }

    public function test_a_EstadoEnvios_Update()
    {
        $EstadoEnvios = array(
            $EstadoEnvios=array(['EstadoEnvio' => ['Pendiente']])
        );
        Arr::set($EstadoEnvios, 'EstadoEnvio', "Pendientes");

        $name="Pendientes";

        $this->assertContains($name, $EstadoEnvios, "testArray doesn't contains value as value");
    }
    public function test_EstadoEnvios_Delete()
    {
         $EstadoEnvios=array(
             $info=[ 'Descripcion'=>'Pendiente'],
         ); 
 
         Arr::pull($info, 'Descripcion');



         $this->assertEmpty($info,"Array is not empty");
    }
}
