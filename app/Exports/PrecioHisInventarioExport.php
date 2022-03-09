<?php

namespace App\Exports;

use App\Models\precio_his_inventario;
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


class PrecioHisInventarioExport implements FromView, ShouldAutoSize, WithDrawings
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

     $probando=DB::table('precio_his_inventarios as h')
     ->join('inventarios as i','h.id_inventario','=','i.id')
     ->select('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
     ->orderby('h.id')
     ->groupBy('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
     ->paginate(15);
   
        return view('precioinventario.excel',[
            'preciosinventario'=> precio_his_inventario::all(),'hoy'=> $Hoy, 'probando'=>$probando
        ]);
    }
}
