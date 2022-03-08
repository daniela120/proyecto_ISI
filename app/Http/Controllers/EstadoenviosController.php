<?php

namespace App\Http\Controllers;

use App\Models\estadoenvios;
use Illuminate\Http\Request;
use App\HTTP\Requests\EstadoenviosRequest;
use Carbon\Carbon;

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
        try {
            //code...
            $datos['Estadoenvios']=Estadoenvios::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        return view('Estadoenvios.Estadoenviosindex',$datos);
    }

    public function pdf()
    {
        
        $estadoenvios = Estadoenvios::paginate();

        $pdf = PDF::loadView('estadoenvios.pdf',['estadoenvios'=>$estadoenvios]);
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        //return view('Estadoenvios.pdf');
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
    public function store(EstadoenviosRequest $request)
    {
        //
        try {
            //code...
            $estadoenvios= request()->except('_token');
        Estadoenvios::insert($estadoenvios);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        alert()->success('Estado de Envío Guardado Correctamente');
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
    public function update(EstadoenviosRequest $request, $id)
    {
        //
        try {
            //code...
            $Estadoenvios= request()->except(['_token','_method']);
            Estadoenvios::where('id','=',$id)->update($Estadoenvios);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Estado de Envío Actualizado Correctamente');
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
        try {
            //code...
            Estadoenvios::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Estado de Envío Eliminado Correctamente');
        return redirect('estadoenvios');
    }
}
