<?php

namespace App\Http\Controllers;

use App\Models\cargoempleados;
use App\Models\salarioshistoricos;
use Illuminate\Http\Request;
use DB;
use App\Exports\SalarioshistoricosExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use PDF;
class SalarioshistoricosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        return Excel::download(new SalarioshistoricosExport, 'salarioshistoricos.xlsx');
    }

    public function index()
    {
        //

        try {
            //code...
            //$precio_his_inventario=precio_his_inventario::paginate(15);
           // $inventarios=inventarios::all();

            $probando=DB::table('salarioshistoricos as h')
            ->join('cargoempleados as i','h.id_cargo','=','i.id')
            ->select('h.id','i.Cargo','h.FechaInicio','h.FechaFinal','h.Sueldo')
            ->orderby('h.id')
            ->groupBy('h.id','i.Cargo','h.FechaInicio','h.FechaFinal','h.Sueldo')
            ->paginate(25);

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    
        return view('salarioshistoricos.index')->withProbando($probando);
    }


    public function pdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $probando=DB::table('salarioshistoricos as h')
        ->join('cargoempleados as i','h.id_cargo','=','i.id')
        ->select('h.id','i.Cargo','h.FechaInicio','h.FechaFinal','h.Sueldo')
        ->orderby('h.id')
        ->groupBy('h.id','i.Cargo','h.FechaInicio','h.FechaFinal','h.Sueldo')
        ->paginate(25);

        $pdf = PDF::loadView('salarioshistoricos.salariohispdf',compact('probando','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        
        //return view('Proveedores.pdf');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salarioshistoricos  $salarioshistoricos
     * @return \Illuminate\Http\Response
     */
    public function show(salarioshistoricos $salarioshistoricos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salarioshistoricos  $salarioshistoricos
     * @return \Illuminate\Http\Response
     */
    public function edit(salarioshistoricos $salarioshistoricos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salarioshistoricos  $salarioshistoricos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salarioshistoricos $salarioshistoricos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salarioshistoricos  $salarioshistoricos
     * @return \Illuminate\Http\Response
     */
    public function destroy(salarioshistoricos $salarioshistoricos)
    {
        //
    }
}