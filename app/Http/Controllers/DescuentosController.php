<?php

namespace App\Http\Controllers;

use App\Models\descuentos;
use Illuminate\Http\Request;
use App\Http\Requests\DescuentosRequest;
use Carbon\Carbon;
use PDF;


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
        try {
            //code...
            $datos['Descuentos']=Descuentos::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        return view('descuentos.index',$datos);
    }
    
    public function pdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $descuentos = Descuentos::paginate();

        $pdf = PDF::loadView('descuentos.descuentopdf',compact('descuentos','hoy'));
        

        
        return $pdf->stream();
        //return $pdf->download('___descuentos.pdf');
        
        //return view('descuentos.pdf', compact( 'descuentos'));
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
        try {
            //code...
            $Descuentos = request()->except('_token');
            Descuentos::insert($Descuentos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Descuento Guardado Correctamente');
        
        return redirect()->route('descuentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\descuentos  $descuentos
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        try {
            //code...
            $Descuentos= request()->except(['_token','_method']);
            Descuentos::where('id','=',$id)->update($Descuentos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Descuento Actualizado Correctamente');
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
        try {
            //code...
            Descuentos::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Descuento Eliminado Correctamente');
        return redirect('descuentos');
    }
}
