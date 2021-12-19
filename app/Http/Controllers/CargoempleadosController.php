<?php

namespace App\Http\Controllers;

use App\HTTP\Requests\CargosRequest;
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
        try {
            //code...
            $datos['cargoempleados']=cargoempleados::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
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
        return view('cargoempleados.create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargosRequest $request)
    {
        //
        try {
            //code...
            $cargoempleados = request()->except('_token');
            cargoempleados::insert($cargoempleados);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Cargo Guardado Correctamente');
        
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
    public function update(CargosRequest $request, $id)
    {
        //
        try {
            //code...
            $cargoempleados= request()->except(['_token','_method']);
            cargoempleados::where('id','=',$id)->update($cargoempleados);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Cargo Actualizado Correctamente');
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
        try {
            //code...
            cargoempleados::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
        alert()->success('Cargo Eliminado Correctamente');
        return redirect('cargoempleados');
    }
}
