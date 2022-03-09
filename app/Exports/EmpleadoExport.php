<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\tipodocumentos;
use App\Models\User;
use App\Models\Turnos;
use App\Models\cargoempleados;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class EmpleadoExport implements FromView, ShouldAutoSize, WithDrawings
//, WithHeadings
{
  use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection|null
 */

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/img/logo-coffee.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('D2');

        return $drawing;
    }

    public function view(): View
    {
        
     $mytime= Carbon::now("America/Lima");          
     $Hoy=$mytime->toDateTimeString();

     $probando=DB::table('empleados as e')
            ->join('users as u','e.Id_Usuario','=','u.id')
            ->join('turnos as t','e.Id_Turno','=','t.id')
            ->join('cargoempleados as c','e.Id_Cargo','=','c.id')
            ->join('tipodocumentos as d','e.Id_Documento','=','d.id')
            ->select('e.id','e.Nombre','e.Apellido','e.FechaNacimiento','e.FechaContratacion','c.Cargo','e.Telefono','u.name','t.TipoTurno','e.Documento','d.TipoDocumento')
            ->orderby('e.id')
            ->groupBy('e.id','e.Nombre','e.Apellido','e.FechaNacimiento','e.FechaContratacion','c.Cargo','e.Telefono','u.name','t.TipoTurno','e.Documento','d.TipoDocumento')
            ->paginate(25);
   
        return view('empleado.excel',[
            'empleado'=> Empleado::all(), 'documentos'=>tipodocumentos::all(), 'cargos'=>cargoempleados::all(),
            'hoy'=> $Hoy, 'users'=>User::all(), 'turnos'=>turnos::all(), 'probando'=>$probando
        ]);
    }
}

