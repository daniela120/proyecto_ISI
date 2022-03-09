<?php

namespace App\Exports;

use App\Models\factura;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use App\Models\pedidos;
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


class FacturaExport implements FromView, ShouldAutoSize, WithDrawings
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

     $tiposdepago=tiposdepago::all();
     $clientes=clientes::all();
     $empleado=Empleado::all();  
     $pedidos = pedidos::paginate();

     $probando=DB::table('pedidos as p')
        ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
        ->join('users as u','u.id','=','p.id_usuario')
         ->join('clientes as c','c.id','=','p.id_cliente')
         ->select('p.id','u.name','p.Fecha','tp.Nombre_Tipo_Pago','c.Nombre')     
         ->orderby('p.id')
        ->groupBy('p.id','u.name','p.Fecha','tp.Nombre_Tipo_Pago','c.Nombre')
        ->paginate(50);
   
        return view('factura.excel',[
            'factura'=> factura::all(),'hoy'=> $Hoy, 
            'tiposdepago'=>tiposdepago::all(), 'clientes'=>clientes::all(), 'empleado'=>Empleado::all(), 
            'pedidos'=>pedidos::all(),'probando'=>$probando
            //'tipodepagos'=>$tiposdepago, 'clientes'=>$clientes, 'empleado'=>$empleado
        ]);
    }
}
