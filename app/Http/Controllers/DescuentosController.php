<?php

namespace App\Http\Controllers;

use App\Models\descuentos;
use Illuminate\Http\Request;
use App\Http\Requests\DescuentosRequest;

class DescuentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Descuentos']=Descuentos::paginate(10);
        return view('descuentos.index',$datos);
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
    public function store(DescuentosRequest $request)
    {
        //
        $Descuentos = request()->except('_token');
        Descuentos::insert($Descuentos);
        alert()->success('Descuento guardado correctamente');
        
        return redirect()->route('descuentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\descuentos  $descuentos
     * @return \Illuminate\Http\Response
     */
    public function show(descuentos $descuentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\descuentos  $descuentos
     * @return \Illuminate\Http\Response
     */
    public function edit(descuentos $descuentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\descuentos  $descuentos
     * @return \Illuminate\Http\Response
     */
    public function update(DescuentosRequest $request, $id)
    {
        //
        $Descuentos= request()->except(['_token','_method']);
        Descuentos::where('id','=',$id)->update($Descuentos);
        alert()->success('Descuento Actualizado correctamente');
        return redirect()->route('descuentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\descuentos  $descuentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Descuentos::destroy($id);
        alert()->success('Descuento Eliminado correctamente');
        return redirect('descuentos');
    }
}
