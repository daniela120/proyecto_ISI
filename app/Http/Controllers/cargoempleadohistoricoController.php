<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cargoempleadohistorico;
use Illuminate\Support\Facades\DB;

class cargoempleadohistoricoController extends Controller
{
    //

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




}
