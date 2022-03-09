<?php

namespace App\Exports;

use App\Models\detallepedidos;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\factura;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use App\Models\pedidos;
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

class DetallePedidosExport implements FromView, ShouldAutoSize, WithDrawings
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

     $pedido=DB::table('pedidos as p')
           ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
         
         ->join('users as u','u.id','=','p.id_usuario')
          ->join('clientes as c','c.id','=','p.id_cliente')
          ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
          ->select('p.id','p.Fecha','u.name as NombreU','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
         ->where('p.id','=',$id)     
          ->orderby('p.id')
            ->groupBy('p.id','p.Fecha','NombreU','c.Nombre','tp.Nombre_Tipo_Pago','total')
            ->first();

       

      $detallepedidos=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','dp.Id_Producto')
          ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
           ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
           ->where('dp.pedidos_id','=',$id)
           ->get();    
        
   
        return view('pedidos.exceld',[
            'factura'=> factura::all(),'hoy'=> $Hoy, 
            'tiposdepago'=>tiposdepago::all(), 'clientes'=>clientes::all(), 'empleado'=>Empleado::all(), 
            'pedidos'=>pedidos::all(),'probando'=>$probando, 'detallepedidos'=>$detallepedidos, 
            'pedido'=>$pedido
            //'tipodepagos'=>$tiposdepago, 'clientes'=>$clientes, 'empleado'=>$empleado
        ]);
    }
}
