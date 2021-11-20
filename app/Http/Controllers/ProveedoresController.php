<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedoresRequest;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Proveedores']=Proveedores::paginate(10);
        return view('Proveedores.proveedoresindex',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedoresRequest $request)
    {
        $Proveedores = request()->except('_token');
        Proveedores::insert($Proveedores);
        alert()->success('Proveedor guardado correctamente');
        
        return redirect()->route('proveedores.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(ProveedoresRequest $request, $id)
    {
        $Proveedores= request()->except(['_token','_method']);
        Proveedores::where('id','=',$id)->update($Proveedores);
        alert()->success('Proveedor Actualizado correctamente');
        return redirect()->route('proveedores.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedoresRequest $request, $id)
    {
        $Proveedores= request()->except(['_token','_method']);
        Proveedores::where('id','=',$id)->update($Proveedores);
        alert()->success('Proveedor Actualizado correctamente');
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedores::destroy($id);
        alert()->success(' Proveedor Eliminado correctamente');
        return redirect('proveedores');
    }
}
