<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Productos;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\categorias;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ProductosExport implements FromView, ShouldAutoSize, WithDrawings
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

    $probando=DB::table('productos as p')
    ->join('categorias as c','p.id_Categoria','=','c.id')            
    ->select('p.id','p.NombreProducto','p.Descripcion','c.Categoria','p.Precio')
    ->orderby('p.id')
    ->groupBy('p.id','p.NombreProducto','p.Descripcion','c.Categoria','p.Precio')
    ->paginate(25);
    $mytime= Carbon::now("America/Lima");
                
    $Hoy=$mytime->toDateTimeString();
  
       return view('productos.excel',[
        'products'=>productos::all(), 'categorias'=>categorias::all(), 
        'probando'=> $probando, 'hoy'=> $Hoy
        ]);
    }

  //  public function view(): array
    //{
      //return[
        //'',
   //   ]

// }
      }


//class ProductosExport implements FromView
//{
  //  use Exportable;
    
    
//}

