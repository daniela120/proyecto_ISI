<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class EmpleadoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_exampleIndex()
    {

        $Empleados=array(
            $Nombre=array('Andres','Julian','Wilson'),
            $Apellido=array("Cano","Lopez",'Ramos'),
            $FechaNacimiento=array("2000-10-10","2000-10-10","2000-10-10"),
            $FechaContratacion=array("2020-10-10","2020-10-10","2020-10-10"),
            $Direccion=array("Alameda","Hidalgos",'Carrizal'),
            $Cargo=array("Admin","Cocinero",'Aseador'),
            $Telefono=array("95697043","95697042",'95697047'),
            $Usuario=array('Andres','Julian','Wilson'),
            $TipoDocumento=array("RTN","Id",'Pasaporte'),
            $Turno=array("Matutino","Matutino",'Matutino'),
            $Documento=array('0801200038789','0801200038788','0801200038787')
   
        );

        $datos=$Empleados;
        $name=$Nombre;
       
        $this->assertContains($name,$datos,"testArray doesn't contains value as value");
    } 

    public function test_exampleStore()
    {

        $Empleados=array(
            $Nombre=array('Andres','Julian','Wilson'),
            $Apellido=array("Cano","Lopez",'Ramos'),
            $FechaNacimiento=array("2000-10-10","2000-10-10","2000-10-10"),
            $FechaContratacion=array("2020-10-10","2020-10-10","2020-10-10"),
            $Direccion=array("Alameda","Hidalgos",'Carrizal'),
            $Cargo=array("Admin","Cocinero",'Aseador'),
            $Telefono=array("95697043","95697042",'95697047'),
            $Usuario=array('Andres','Julian','Wilson'),
            $TipoDocumento=array("RTN","Id",'Pasaporte'),
            $Turno=array("Matutino","Matutino",'Matutino'),
            $Documento=array('0801200038789','0801200038788','0801200038787')
   
        );

        $ayer = new Carbon('yesterday');
        $ayer=$ayer->format('Y-m-d');

        $CargoH=array(
            $Empleado=array('Andres','Julian','Wilson'),
            $Cargo=array('Admin','Cocinero','Aseador'),
            $FechaInicio=array('2019-07-08','2019-07-08','2019-07-08'),
            $FechaFinal=array("","",''),
            
         
        );
        array_push($Nombre, "Maria");
        array_push($Apellido, "Sanchez");
        array_push($Empleado, "Maria");
        array_push($Cargo, "Cajera");
        
        array_push($FechaNacimiento, "1999-01-03");
        array_push($Direccion, "Alameda");
        array_push($Telefono, "98092020");
        array_push($Usuario, "Maria");
        array_push($TipoDocumento, "Id");
        array_push($Turno, "Matutino");
        array_push($Documento, "0801199926786");
        array_push($FechaContratacion, $ayer);
        array_push($FechaInicio, $ayer);
        array_push($FechaFinal, '');

        

        $name="Maria";
        $valH=$ayer;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$Nombre,"testArray doesn't contains value as value");
        $this->assertContains($valH,$FechaInicio,"testArray doesn't contains value as value");
    } 

   


    public function test_exampleUpdate()
    {

        $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');


            $Empleados=array(
                $datos=array(['Nombre' =>'Andre'],['Apellido' =>'Andujar'],['FechaNacimiento' =>'2000-01-09'],
                ['FechaContratacion' =>'2020-09-08'],['Direccion' =>'Colinas'],['Telefono' =>'89890987'],['Cargo' =>'Admin'],
                ['Turno' =>'Matutino'],['Documento' =>'0801200098987'],['TipoDocumento' =>'Id'],['Usuario' =>'Andre'],),
            );

        $ayer = new Carbon('yesterday');
        $ayer=$ayer->format('Y-m-d');


        $CargosH=array(
            //$Cargos=array('Admin','Cocinero','Aseador'),
            $datos=array(['Nombre'=>"Andre"],['Cargo'=>'Admin'],['FechaInicio'=>'2020-09-08'],
            ['FechaFinal'=>'']),
            
            
        
        );

       
        Arr::set($datos,'Cargo','Cocinero');        
        Arr::set($datos,'FechaInicio',$hoy);
        Arr::set($datos,'FechaFinal',$ayer);


        $name='Cocinero';
        $valH=$ayer;
        
        
        $this->assertContains($name,$datos,"testArray doesn't contains value as value");
        $this->assertContains($valH,$datos,"testArray doesn't contains value as value");
    } 

    public function test_exampleDelete()
    {

        $Empleados=array(
            $datos=array('Nombre' =>'Andre','Apellido' =>'Andujar','FechaNacimiento' =>'2000-01-09',
            'FechaContratacion' =>'2020-09-08','Direccion' =>'Colinas','Telefono' =>'89890987','Cargo' =>'Admin',
            'Turno' =>'Matutino','Documento' =>'0801200098987','TipoDocumento' =>'Id','Usuario' =>'Andre',),
        );

        $CargosH=array(
            //$Cargos=array('Admin','Cocinero','Aseador'),
            $datosH=array('Nombre'=>"Andre",'Cargo'=>'Admin','FechaInicio'=>'2020-09-08',
            'FechaFinal'=>'2021-01-09'),
            
            
        
        );


        
        
        Arr::pull($datos, 'Nombre');
        Arr::pull($datos, 'Cargo');
        Arr::pull($datos, 'Apellido');
        Arr::pull($datos, 'FechaNacimiento');
        Arr::pull($datos, 'FechaContratacion');
        Arr::pull($datos, 'Direccion');
        Arr::pull($datos, 'Telefono');
        Arr::pull($datos,'Turno');
        Arr::pull($datos, 'Documento',);
        Arr::pull($datos, 'TipoDocumento');
        Arr::pull($datos, 'Usuario');

        Arr::pull($datosH, 'Cargo');
        Arr::pull($datosH, 'Nombre');
        Arr::pull($datosH, 'FechaInicio');
        Arr::pull($datosH, 'FechaFinal');

       
        
        $this->assertEmpty($datos,"Array is not empty");
        $this->assertEmpty($datosH,"Array is not empty");
        //$this->assertEmpty($infoH,"Array is not empty");
        //$this->assertContains($name,$datos,"testArray doesn't contains value as value");
        

    }




}
