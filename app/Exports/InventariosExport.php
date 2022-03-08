<?php

namespace App\Exports;

use App\Models\Inventarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use App\Models\categorias;
use App\Models\proveedores;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\DB;

class InventariosExport implements FromView, ShouldAutoSize, WithDrawings
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
        $probando=DB::table('inventarios as i')
            ->join('categorias as c','i.Id_Categoria','=','c.id')
            ->join('proveedores as p','i.Id_Proveedor','=','p.id')
            ->select('i.id','i.NombreInventario','c.Categoria','i.PrecioUnitario','i.CantidadStock','i.StockActual','i.StockMin','i.StockMax','p.NombreCompania','i.Descontinuado','i.Id_Proveedor','Id_Categoria')
            ->orderby('i.id')
            ->groupBy('i.id','i.NombreInventario','c.Categoria','i.PrecioUnitario','i.CantidadStock','i.StockActual','i.StockMin','i.StockMax','p.NombreCompania','i.Descontinuado','i.Id_Proveedor','Id_Categoria')
            ->paginate(25);

        $mytime= Carbon::now("America/Lima");
        $Hoy=$mytime->toDateTimeString();
   
        return view('inventarios.excel',[
            'inventarios'=> Inventarios::all(), 'proveedores'=>proveedores::all(), 'hoy'=> $Hoy, 
            'categorias'=>categorias::all(), 'probando'=>$probando
        ]);
    }
}
