<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedoresRequest;
use App\Exports\ProveedoresExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Log;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        try{
           return Excel::download(new ProveedoresExport, 'proveedores.xlsx');

        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    public function index()
    {
        try {
            //code...
            $datos['Proveedores']=Proveedores::paginate(10);
            
        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
        return view('Proveedores.proveedoresindex',$datos);
    }

    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $Proveedores = Proveedores::paginate();
            
            $pdf = PDF::loadView('proveedores.proveedorpdf',compact('Proveedores','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___proveedores.pdf');

        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('Proveedores.create');

        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedoresRequest $request)
    {

        try {
            //code...
            $Proveedores = request()->except('_token');
            Proveedores::insert($Proveedores);
        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
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
        try{
            $Proveedores= request()->except(['_token','_method']);
            Proveedores::where('id','=',$id)->update($Proveedores);
            alert()->success('Proveedor Actualizado correctamente');
            return redirect()->route('proveedores.index');
        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
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
        try {
            //code...
            $Proveedores= request()->except(['_token','_method']);
            Proveedores::where('id','=',$id)->update($Proveedores);

        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        
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
        try{
            Proveedores::destroy($id);

        } catch (\Exception $exception) {
            Log::channel('Proveedores')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
            alert()->success(' Proveedor Eliminado correctamente');
            return redirect('proveedores');
    }
}
