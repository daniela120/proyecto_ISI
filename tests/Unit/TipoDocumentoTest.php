<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class TipoDocumentoTest extends TestCase
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


        $TipoDocumentos=array(
            $Tipodocumento=array('RTN','Identificacion','pasaporte'),
            $Descripcion=array("registro tributario","id",'documento de viaje')
        
        
        );

        $datos=$TipoDocumentos;
        $name=$Tipodocumento;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$TipoDocumentos,"testArray doesn't contains value as value");
    } 

    public function test_exampleStore()
    {

        //$array1=Arr::add(['' => ''], '', '');
        //$array1=Arr::add(['name' => 'Php'], 'Laravel', 100);
        //$array1=Arr::add(['name' => 'Python'], 'Laravel', 60);
        $TipoDocumentos=array(
            $Tipodocumento=array('RTN','Identificacion','pasaporte'),
            $Descripcion=array("registro tributario","id",'documento de viaje')
        
        );

        //$arreglo1=array("Tipo documento"=>"Identificacion", "Descripcion"=> "documento de identificacion");
        //$name = "documento de identificacion";
        array_push($Tipodocumento, "Partida de nacimiento");
        array_push($Descripcion, "documento de nacimiento");

        $name="Partida de nacimiento";
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$Tipodocumento,"testArray doesn't contains value as value");
    } 

    public function test_exampleUpdate()
    {

        
        $TipoDocumentos=array(
        $Tipodocumento=array(['Tipo de documento' => ['RTN' => ['Descripcion' => 'Registro Tributario']]]),

        );

       
        Arr::set($Tipodocumento,'Tipo de documento',"Identidad");

        $name="Identidad";
        
        
        $this->assertContains($name,$Tipodocumento,"testArray doesn't contains value as value");
    } 

    public function test_exampleDelete()
    {

        $TipoDocumentos=array(
            $info =['Tipo Documento' => 'RTN', 'Descripcion' => 'Registro Tributario'],
    
            );
        
        Arr::pull($info, 'Tipo Documento');
        Arr::pull($info, 'Descripcion');
        
        $this->assertEmpty($info,"Array is not empty");
        
        

    }



}
