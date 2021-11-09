<?php

namespace App\Http\Controllers;

use App\Models\tipodocumentos;
use Illuminate\Http\Request;

class TipodocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tipodocumentos
        $datos['tipodocumentos']=tipodocumentos::paginate(10);
        return view('TipoDocumento.documentosindex',$datos);
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
        $tipodocumentos = request()->except('_token');
        tipodocumentos::insert($tipodocumentos);
        alert()->success('tipo documento guardado correctamente');
        
        return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipodocumentos  $tipodocumentos
     * @return \Illuminate\Http\Response
     */
    public function show(tipodocumentos $tipodocumentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipodocumentos  $tipodocumentos
     * @return \Illuminate\Http\Response
     */
    public function edit(tipodocumentos $tipodocumentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipodocumentos  $tipodocumentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $tipodocumentos= request()->except(['_token','_method']);
        tipodocumentos::where('id','=',$id)->update($tipodocumentos);
        alert()->success('Tipo de documento Actualizado correctamente');
        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipodocumentos  $tipodocumentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        tipodocumentos::destroy($id);
        alert()->success('Tipo de documento Eliminado correctamente');
        return redirect('documentos');
    }
}
