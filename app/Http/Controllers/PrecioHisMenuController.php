<?php

namespace App\Http\Controllers;

use App\Models\precio_his_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\PrecioHisMenuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class PrecioHisMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        try{
            return Excel::download(new PrecioHisMenuExport, '');
            
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('PrecioHisMenu')->info($exception->getMessage());
        // Log::debug( $exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
    }

    public function index()
    {
        
        //
        try {
            //code...
            //$preciomenu=precio_his_menu::all();
            $probando=DB::table('precio_his_menus as h')
            ->join('productos as p','h.id_producto','=','p.id')
            ->select('h.id','p.NombreProducto','h.FechaInicio','h.FechaFinal','h.Precio')
            ->orderby('h.id')
            ->groupBy('h.id','p.NombreProducto','h.FechaInicio','h.FechaFinal','h.Precio')
            ->paginate(15);

        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('PrecioHisMenu')->info($exception->getMessage());
           // Log::debug( $exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }

        return view('preciohistoricomenu.index')->withProbando($probando);
    }

    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $probando=DB::table('precio_his_menus as h')
                ->join('productos as p','h.id_producto','=','p.id')
                ->select('h.id','p.NombreProducto','h.FechaInicio','h.FechaFinal','h.Precio')
                ->orderby('h.id')
                ->groupBy('h.id','p.NombreProducto','h.FechaInicio','h.FechaFinal','h.Precio')
                ->paginate(15);

            $pdf = PDF::loadView('preciohistoricomenu.preciohismenupdf',compact('probando','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___preciohistoricomenu.pdf');
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('PrecioHisMenu')->info($exception->getMessage());
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
     * @param  \App\Models\precio_his_menu  $precio_his_menu
     * @return \Illuminate\Http\Response
     */
    public function show(precio_his_menu $precio_his_menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\precio_his_menu  $precio_his_menu
     * @return \Illuminate\Http\Response
     */
    public function edit(precio_his_menu $precio_his_menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\precio_his_menu  $precio_his_menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, precio_his_menu $precio_his_menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\precio_his_menu  $precio_his_menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(precio_his_menu $precio_his_menu)
    {
        //
    }
}
