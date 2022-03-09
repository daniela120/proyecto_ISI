<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cargoempleadohistorico;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\CargoEmpleadoHistoricoExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class cargoempleadohistoricoController extends Controller
{
    //
    public function excel()
    {
        return Excel::download(new CargoEmpleadoHistoricoExport, 'CargoEmpleadoHistorico.xlsx');
    }

    public function index()
    {

        try {
            //code...
            
            
           // $cargoempleadoshistorico=cargoempleadohistorico::paginate(15);

            $probando=DB::table('cargoempleadohistoricos as c')
            ->join('empleados as e','c.id_empleado','=','e.id')
            ->join('cargoempleados as w','c.id_cargo','=','w.id')
            ->select('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
            ->orderby('c.id')
            ->groupBy('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
            ->paginate(25);
    
            
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('cargoempleadohistorico.index')->withProbando($probando);
    }


    public function pdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $probando=DB::table('cargoempleadohistoricos as c')
        ->join('empleados as e','c.id_empleado','=','e.id')
        ->join('cargoempleados as w','c.id_cargo','=','w.id')
        ->select('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
        ->orderby('c.id')
        ->groupBy('c.id','c.id_empleado','e.Nombre','w.Cargo','c.FechaInicio','c.FechaFinal')
        ->paginate(25);
        
        $pdf = PDF::loadView('cargoempleadohistorico.cargohispdf',compact('probando','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        
        //return view('Proveedores.pdf');
    }

}
