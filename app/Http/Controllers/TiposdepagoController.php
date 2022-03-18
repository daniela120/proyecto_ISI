<?php

namespace App\Http\Controllers;

use App\Models\tiposdepago;
use Illuminate\Http\Request;
use App\Http\Requests\TiposdepagoRequest;
use App\Exports\TiposDePagoExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Log;

class TiposdepagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        try{
            return Excel::download(new TiposdepagoExport, 'tiposdepago.xlsx');

        
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    public function index()
    {
        try {
            //code...
            $datos['tiposdepago']=tiposdepago::paginate(10);
            
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        
        return view('TipoPagos.pagosindex',$datos);
    }

    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";
            
            $tiposdepago = tiposdepago::paginate();
            $pdf = PDF::loadView('tipopagos.pagopdf',compact('tiposdepago','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___tipodepago.pdf');
            
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
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
        try{
          return view('TipoPagos.create');
            
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposdepagoRequest $request)
    {
        try {
            //code...
            $tiposdepago = request()->except('_token');
            tiposdepago::insert($tiposdepago);
            
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
        alert()->success('Tipo de Pago Guardado Correctamente');
        
        return redirect()->route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tiposdepago  $tiposdepago
     * @return \Illuminate\Http\Response
     */
    public function show(tiposdepago $tiposdepago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tiposdepago  $tiposdepago
     * @return \Illuminate\Http\Response
     */
    public function edit(tiposdepago $tiposdepago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tiposdepago  $tiposdepago
     * @return \Illuminate\Http\Response
     */
    public function update(TiposdepagoRequest $request, $id)
    {
        try {
            //code...
            $tiposdepago= request()->except(['_token','_method']);
            tiposdepago::where('id','=',$id)->update($tiposdepago);
           
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
        alert()->success('Tipo de Pagos Actualizada Correctamente');
        return redirect()->route('pagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tiposdepago  $tiposdepago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            tiposdepago::destroy($id);
            
        } catch (\Exception $exception) {
            Log::channel('Tiposdepago')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
      
        alert()->success('Tipo de Pago Eliminado Correctamente');
        return redirect('pagos');
    }
}
