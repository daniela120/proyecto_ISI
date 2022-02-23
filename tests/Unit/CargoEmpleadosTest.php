<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class CargoEmpleadosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_exampleIndex()
    {

        $CargoEmpleados=array(
            $Cargos=array('Admin','Cocinero','Aseador'),
            $Descripcion=array("Gestiona","Cocina",'Asea'),
            $Salario=array(15000,12000,9000)
   
        );

        $datos=$CargoEmpleados;
        $name=$Cargos;
       
        $this->assertContains($name,$CargoEmpleados,"testArray doesn't contains value as value");
    } 

    public function test_exampleStore()
    {

        $CargoEmpleados=array(
            $Cargos=array('Admin','Cocinero','Aseador'),
            $Descripcion=array("Gestiona","Cocina",'Asea'),
            $Salario=array(15000,12000,9000)
    
        );

        $ayer = new Carbon('yesterday');
        $ayer=$ayer->format('Y-m-d');

        $SalarioH=array(
            $Cargos=array('Admin','Cocinero','Aseador'),
            $FechaInicio=array('2019-07-08','2019-07-08','2019-07-08'),
            $FechaFinal=array("","",''),
            $Salario=array(15000,12000,9000)
         
        );

        array_push($Cargos, "Guardia");
        array_push($Descripcion, "Cuida");
        array_push($FechaInicio, $ayer);
        array_push($Salario, 8000);

        $name="Guardia";
        $valH=$ayer;
        
        //$this->assertEmpty($array1,'el array no esta vacio');
        $this->assertContains($name,$Cargos,"testArray doesn't contains value as value");
        $this->assertContains($valH,$FechaInicio,"testArray doesn't contains value as value");
    } 


    public function test_exampleUpdate()
    {

        $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');


        $CargoEmpleados=array(
            $Cargos=array(['Cargo' => ['Admin' => ['Descripcion' => 'Administra']]],['Salario'=>[15000]]),
            
            $Salario=array(['Salario'=>15000])
            
        
        );

        $ayer = new Carbon('yesterday');
        $ayer=$ayer->format('Y-m-d');


        $SalarioH=array(
            //$Cargos=array('Admin','Cocinero','Aseador'),
            $Cargos=array(['Cargo' => ['Admin' => ['Descripcion' => 'Administra']]],['Salario'=>[15000]]),
            $FechaInicio=array(['FechaInicio'=>'2019-07-08']),
            $FechaFinal=array(['FechaFinal'=>'']),
            $Salario=array(['Salario'=>15000])
            
        
        );

       
        Arr::set($Cargos,'Cargo','Administrador');
        Arr::set($Salario,'Salario',20000);
        Arr::set($FechaInicio,'FechaInicio',$hoy);
        Arr::set($FechaFinal,'FechaFinal',$ayer);


        $name=20000;
        
        
        $this->assertContains($name,$Salario,"testArray doesn't contains value as value");
    } 


    public function test_exampleDelete()
    {

        $CargoEmpleados=array(
            $info =['Cargo' => 'Administrador', 'Descripcion' => 'Administra'],
    
            );

            $SalarioH=array(
                $infoH =['Cargo' => 'Administrador', 'Salario' => 20000,'Fecha Inicio'=>'2019-02-15','Fecha Final'=>'2021-01-03'],
        
                );


        
        Arr::pull($info, 'Cargo');
        Arr::pull($info, 'Descripcion');

        Arr::pull($infoH, 'Cargo');
        Arr::pull($infoH, 'Salario');
        Arr::pull($infoH, 'Fecha Inicio');
        Arr::pull($infoH, 'Fecha Final');
        
        $this->assertEmpty($info,"Array is not empty");
        $this->assertEmpty($infoH,"Array is not empty");
        
        

    }




}
