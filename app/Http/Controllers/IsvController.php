<?php

namespace App\Http\Controllers;

use App\Models\isv;
use Illuminate\Http\Request;
use App\HTTP\Requests\IsvRequest;
use Carbon\Carbon;
use PDF;
use App\Exports\IsvExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class IsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        try{
          return Excel::download(new IsvExport, 'isv.xlsx');
   
        } catch (\Exception $exception) {
            //throw $th;       
            Log::channel('isv')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
     }

    public function index()
    {
        //
        try {
            //code...
            $datos['isv']=isv::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            
            Log::channel('isv')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        return view('isv.isvindex',$datos);
    }

    public function pdf()
    { 
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $isv = isv::paginate();
            $pdf = PDF::loadView('isv.isvpdf',compact('isv','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___isv.pdf');
        } catch (\Exception $exception) {
    
            Log::channel('isv')->info($exception->getMessage());
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IsvRequest $request)
    {
        //
        try {
            //code...
            $isv = request()->except('_token');
        isv::insert($isv);
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('isv')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }     
        alert()->success('isv guardado correctamente');
        return redirect()->route('isv.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\isv  $isv
     * @return \Illuminate\Http\Response
     */
    public function show(isv $isv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\isv  $isv
     * @return \Illuminate\Http\Response
     */
    public function edit(isv $isv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\isv  $isv
     * @return \Illuminate\Http\Response
     */
    public function update(IsvRequest $request, $id)
    {
        //
        try {
            //code...
            $isv= request()->except(['_token','_method']);
            isv::where('id','=',$id)->update($isv);
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('isv')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('ISV Actualizado correctamente');
        return redirect()->route('isv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\isv  $isv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            isv::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('isv')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('ISV Eliminado correctamente');
        return redirect('isv');
    }
    
}
