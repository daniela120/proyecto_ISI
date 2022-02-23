<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class TurnosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Turnos_Index()
    {
        $Turnos = array(
            $TipoTurno=array('Mañana','Tarde'),
            $Descripcion=array('de mañana','de Tarde'),
            $HoraEntrada=array('06:00','12:00'),
            $HoraSalida=array('11:50','04:50')
        );
        $datos = $Turnos;
        $name = $TipoTurno;
        
        $this->assertContains($name, $Turnos,"testArray doesn't contains value as value");
    }

    public function test_a_Turnos_Store()
    {
        $Turnos = array(
            $TipoTurno=array('Mañana','Tarde'),
            $Descripcion=array('de mañana','de Tarde'),
            $HoraEntrada=array('06:00','12:00'),
            $HoraSalida=array('11:50','04:50')
        );
        array_push($TipoTurno, "Noche");

        $name="Noche";

        $this->assertContains($name, $TipoTurno, "testArray doesn't contains value as value");
    }

    public function test_a_Turnos_Update()
    {
        $Turnos = array(
            $Turnos=array(['Turno' => ['Noches']])
        );
        Arr::set($Turnos, 'Turno', "Noche");

        $name="Noche";

        $this->assertContains($name, $Turnos, "testArray doesn't contains value as value");
    }
}
