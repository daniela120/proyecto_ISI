<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use App\Models\proveedores;
use App\Models\categorias;
use Illuminate\Http\Request;
use App\Models\precio_his_inventario;
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
        try {
            //code...
            $inventarios=inventarios::paginate(15);
            $proveedores=proveedores::all();
            $categorias=categorias::all();
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
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
        try {
            //code...
            $inventarios=request()->except('_token');
            inventarios::insert($inventarios);
            
            $precio_his_inventario = precio_his_inventario::create([
                'PrecioStock'=> $request->precio_his_inventario,
            ]);
            $precio_his_inventario->inventario()->save($inventario);

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Guardado correctamente en inventario');
        return redirect()->route('inventarios.index');

        

        //$precio_his_inventario=request()->except('_token');
        //$inventarios = new precio_his_inventario;
        /*$precio_his_inventario->Precio->=$request->input($inventario 'Precio') 
        $precio_his_inventario->id_inventario=$request->input('id');
        $precio_his_inventario->Precio=$request->get($inventarios->PrecioUnitario);
        */
        //$inventarios->PrecioUnitario=$request->input('Precio');

        /*$precio_his_inventario = new inventario;
        'id' =>$request->get('id');
        'Precio' =>$request->get('PrecioUnitario');
        */

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
        try {
            //code...
            $proveedores=proveedores::all();
            $categorias=categorias::all();
            $inventarios= request()->except(['_token','_method']);
            
            inventarios::where('id','=',$id )->update($inventarios);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
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
        try {
            //code...
            inventarios::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Producto Eliminado correctamente de inventario');
        return redirect('inventarios');
    }
}
