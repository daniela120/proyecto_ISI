<?php

namespace App\Exports;

use App\Models\cargoempleadohistorico;
use Maatwebsite\Excel\Concerns\FromCollection;

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

class CargoEmpleadoHistoricoExport implements FromView, ShouldAutoSize, WithDrawings
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

     $probando=DB::table('cargoempleadohistoricos as c')
     ->join('empleados as e','c.id_empleado','=','e.id')
     ->join('cargoempleados as w','c.id_cargo','=','w.id')
     ->select('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
     ->orderby('c.id')
     ->groupBy('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
     ->paginate(25);
   
        return view('cargoempleadohistorico.excel',[
            'cargoempleadohistorico'=> cargoempleadohistorico::all(),'hoy'=> $Hoy, 'probando'=> $probando
        ]);
    }
}
