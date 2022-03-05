<?php

namespace App\Http\Controllers;

use App\Models\tipodocumentos;
use Illuminate\Http\Request;
use App\Http\Requests\TipodocumentosRequest;

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
        try {
            //code...
            $datos['tipodocumentos']=tipodocumentos::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('TipoDocumento.documentosindex',$datos);
    }

    public function pdf()
    {
        
        $tipodocumentos = tipodocumentos::paginate();
        
        return view('TipoDocumento.pdf');
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
    public function store(TipodocumentosRequest $request)
    {
        //
        try {
            //code...
            $tipodocumentos = request()->except('_token');
        tipodocumentos::insert($tipodocumentos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        alert()->success('Tipo Documento Guardado Correctamente');
        
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
    public function update(TipodocumentosRequest $request, $id)
    {
        //
        try {
            //code...
            $tipodocumentos= request()->except(['_token','_method']);
            tipodocumentos::where('id','=',$id)->update($tipodocumentos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Tipo de Documento Actualizado Correctamente');
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
        try {
            //code...
            tipodocumentos::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Tipo de Documento Eliminado Correctamente');
        return redirect('documentos');
    }
}
