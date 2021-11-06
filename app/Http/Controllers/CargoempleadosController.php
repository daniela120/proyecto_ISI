<?php

namespace App\Http\Controllers;

use App\Models\cargoempleados;
use Illuminate\Http\Request;

class CargoempleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cargoempleados']=cargoempleados::paginate(10);
        return view('cargoempleados.cargoempleadosindex',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cargoempleadsos.create');
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
        $cargoempleados = request()->except('_token');
        cargoempleados::insert($cargoempleados);
        alert()->success('Cargo guardada correctamente');
        
        return redirect()->route('cargoempleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cargoempleados  $cargoempleados
     * @return \Illuminate\Http\Response
     */
    public function show(cargoempleados $cargoempleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cargoempleados  $cargoempleados
     * @return \Illuminate\Http\Response
     */
    public function edit(cargoempleados $cargoempleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cargoempleados  $cargoempleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cargoempleados= request()->except(['_token','_method']);
        cargoempleados::where('id','=',$id)->update($cargoempleados);
        alert()->success('Cargo Actualizada correctamente');
        return redirect()->route('cargoempleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cargoempleados  $cargoempleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        cargoempleados::destroy($id);
        alert()->success('Cargo Eliminada correctamente');
        return redirect('cargoempleados');
    }
}
