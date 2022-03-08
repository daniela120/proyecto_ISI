<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ClientesExport implements FromView, ShouldAutoSize, WithDrawings
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
        $probando=DB::table('clientes as c')
            ->join('users as u','c.Id_Usuario','=','u.id')
            ->select('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->orderby('c.id')
            ->groupBy('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->paginate(25);
     $mytime= Carbon::now("America/Lima");
                 
     $Hoy=$mytime->toDateTimeString();
   
        return view('clientes.excel',[
            'clientes'=>clientes::all(), 'users'=>User::all(), 'hoy'=> $Hoy, 'probando'=> $probando
        ]);
    }
}
