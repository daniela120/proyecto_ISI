<?php

namespace App\Http\Controllers;

use App\Models\tiposdepago;
use Illuminate\Http\Request;

class TiposdepagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tiposdepago']=tiposdepago::paginate(10);
        return view('TipoPagos.pagosindex',$datos);
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
    public function store(Request $request)
    {
        $tiposdepago = request()->except('_token');
        tiposdepago::insert($tiposdepago);
        alert()->success('Tipo de Pago guardado correctamente');
        
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
    public function update(Request $request, $id)
    {
        $tiposdepago= request()->except(['_token','_method']);
        tiposdepago::where('id','=',$id)->update($tiposdepago);
        alert()->success('Tipo de Pagos Actualizada correctamente');
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
        tiposdepago::destroy($id);
        alert()->success('Tipo de Pago Eliminado correctamente');
        return redirect('pagos');
    }
}
