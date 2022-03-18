<?php

namespace App\Http\Controllers;

use App\Models\precio_his_inventario;
use Illuminate\Http\Request;
use App\Models\Inventarios;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Log;
use App\Exports\PrecioHisInventarioExport;
use Maatwebsite\Excel\Facades\Excel;

class PrecioHisInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        try{
            return Excel::download(new PrecioHisInventarioExport, '');
        } catch (\Exception $exception) {
            //throw $th;         
            Log::channel('PrecioHisInventario-')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }
    public function index()
    {
        //

        try {
            //code...
            //$precio_his_inventario=precio_his_inventario::paginate(15);
           // $inventarios=inventarios::all();

            $probando=DB::table('precio_his_inventarios as h')
           ->join('inventarios as i','h.id_inventario','=','i.id')
            ->select('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
            ->orderby('h.id')
            ->groupBy('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
            ->paginate(15);

        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('PrecioHisInventario-')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    
        return view('precioinventario.index')->withProbando($probando);
    }


    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $probando=DB::table('precio_his_inventarios as h')
                ->join('inventarios as i','h.id_inventario','=','i.id')
                ->select('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
                ->orderby('h.id')
                ->groupBy('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
                ->paginate(15);

            $pdf = PDF::loadView('precioinventario.precioinventariopdf',compact('probando','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___preciohistoricoinventario.pdf');

        } catch (\Exception $exception) {
            //throw $th;         
            Log::channel('PrecioHisInventario-')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
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
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function show(precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(precio_his_inventario $precio_his_inventario)
    {
        //
    }
}
