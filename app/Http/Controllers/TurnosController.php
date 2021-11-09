<?php

namespace App\Http\Controllers;

use App\Models\turnos;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['turnos']=turnos::paginate(10);
        return view('Turnos.Turnosindex',$datos);
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
        $turnos = request()->except('_token');
        turnos::insert($turnos);
        alert()->success('Turno guardado correctamente');
        
        return redirect()->route('turnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function show(turnos $turnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function edit(turnos $turnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $turnos= request()->except(['_token','_method']);
        turnos::where('id','=',$id)->update($turnos);
        alert()->success('Turno Actualizado correctamente');
        return redirect()->route('turnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        turnos::destroy($id);
        alert()->success('Turno Eliminado correctamente');
        return redirect('turnos');
    }
}
