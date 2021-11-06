<?php

namespace App\Http\Controllers;

use App\Models\estadoenvios;
use Illuminate\Http\Request;

class EstadoenviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Estadoenvios']=Estadoenvios::paginate(10);
        return view('Estadoenvios.Estadoenviosindex',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('EstadoEnvios.create');
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
        $estadoenvios= request()->except('_token');
        Estadoenvios::insert($estadoenvios);
        alert()->success('Estado de envio guardado correctamente');
        return redirect()->route('estadoenvios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estadoenvios  $estadoenvios
     * @return \Illuminate\Http\Response
     */
    public function show(estadoenvios $estadoenvios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estadoenvios  $estadoenvios
     * @return \Illuminate\Http\Response
     */
    public function edit(estadoenvios $estadoenvios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estadoenvios  $estadoenvios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Estadoenvios= request()->except(['_token','_method']);
        Estadoenvios::where('id','=',$id)->update($Estadoenvios);
        alert()->success('Estado de envio Actualizado correctamente');
        return redirect()->route('estadoenvios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estadoenvios  $estadoenvios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Estadoenvios::destroy($id);
        alert()->success('Estadoenvio Eliminado correctamente');
        return redirect('estadoenvios');
    }
}
