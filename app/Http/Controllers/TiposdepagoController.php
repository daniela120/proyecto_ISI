<?php

namespace App\Http\Controllers;

use App\Models\tiposdepago;
use Illuminate\Http\Request;
use App\Http\Requests\TiposdepagoRequest;
use App\Exports\TiposDePagoExport;
use Maatwebsite\Excel\Facades\Excel;

class TiposdepagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        return Excel::download(new TiposdepagoExport, 'tiposdepago.xlsx');
    }

    public function index()
    {
        try {
            //code...
            $datos['tiposdepago']=tiposdepago::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        return view('TipoPagos.pagosindex',$datos);
    }

    public function pdf()
    {
        
        $tiposdepago = tipopagos::paginate();
        $pdf = PDF::loadView('tiposdepago.pdf',['tiposdepago'=>$tiposdepago]);
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        //return view('TipoPagos.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoPagos.create');
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
            //throw $th;
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
            //throw $th;
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
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
      
        alert()->success('Tipo de Pago Eliminado Correctamente');
        return redirect('pagos');
    }
}
