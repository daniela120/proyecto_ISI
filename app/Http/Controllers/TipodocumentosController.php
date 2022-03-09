<?php

namespace App\Http\Controllers;

use App\Models\tipodocumentos;
use Illuminate\Http\Request;
use App\Http\Requests\TipodocumentosRequest;
use App\Exports\TipoDocumentosExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PDF;

class TipodocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        return Excel::download(new TipoDocumentosExport, 'tipodocumentos.xlsx');
    }

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
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $tipodocumentos = tipodocumentos::paginate();
        $pdf = PDF::loadView('tipodocumento.documentopdf',compact('tipodocumentos','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        //return $pdf->stream();
        return $pdf->download('___tipodocumento.pdf');
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
