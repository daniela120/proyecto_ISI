<?php

namespace App\Exports;

use App\Models\Categorias;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CategoriasExport implements FromView, ShouldAutoSize, WithDrawings
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
   
        return view('categorias.excel',[
            'categorias'=> Categorias::all(),'hoy'=> $Hoy
        ]);
    }
}
