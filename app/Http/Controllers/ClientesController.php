<?php

namespace App\Http\Controllers;

use App\HTTP\Requests\ClientesRequest;
use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cliente']= clientes::paginate(10);
        return view('clientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        //
        
        
        $Clientes = request()->except('_token');
        clientes::insert($Clientes);
        alert()->success('Cargo guardada correctamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /*
        $clientes=clientes::findOrFail($id);

        return view('clientes.edit', compact('clientes') );
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesRequest $request, $id)
    {
            
        //
        $Clientes = request()->except(['_token','_method']);
        clientes::where('id','=',$id)->update($Clientes);
        alert()->success('Cliente Actualizada correctamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        clientes::destroy($id);
        alert()->success('Categoria Eliminada correctamente');
        return redirect('clientes');
    }
}
