<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use App\Models\proveedores;
use App\Models\categorias;
use Illuminate\Http\Request;
use App\HTTP\Requests\InventarioRequestt;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventarios=inventarios::paginate(15);
        $proveedores=proveedores::all();
        $categorias=categorias::all();
        return view('inventarios.Inventariosindex')->withInventarios($inventarios)->withProveedores($proveedores)->withCategorias($categorias);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventarioRequestt $request)
    {
        //
        $inventarios=request()->except('_token');
        inventarios::insert($inventarios);
        alert()->success('Guardado correctamente en inventario');
        return redirect()->route('inventarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function show(inventarios $inventarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function edit(inventarios $inventarios)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function update(InventarioRequestt $request, $id)
    {
        //
        $proveedores=proveedores::all();
        $categorias=categorias::all();
        $inventarios= request()->except(['_token','_method']);
        
        inventarios::where('id','=',$id )->update($inventarios);
        alert()->success('Inventario Actualizado correctamente');
        return redirect()->route('inventarios.index')->withProveedores($proveedores)->withInventarios($inventarios)->withCategorias($categorias);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        inventarios::destroy($id);
        alert()->success('Producto Eliminado correctamente de inventario');
        return redirect('inventarios');
    }
}
