<?php

namespace App\Http\Controllers;

use App\HTTP\Requests\TurnoRequest;
use App\Models\turnos;
use Illuminate\Http\Request;
use App\Exports\TurnosExport;
use Maatwebsite\Excel\Facades\Excel;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        return Excel::download(new TurnosExport, 'turnos.xlsx');
    }

    public function index()
    {
        //
        try {
            //code...
            $datos['turnos']=turnos::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('Turnos.Turnosindex',$datos);
    }

    public function pdf()
    {
        
        $turnos = turnos::paginate();
        $pdf = PDF::loadView('turnos.pdf',['turnos'=>$turnos]);
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        //return view('Turnos.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnoRequest $request)
    {
        //
        try {
            //code...
            $turnos = request()->except('_token');
            turnos::insert($turnos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        /*$this->validate($request, [
            'HoraEntrada' => 'date_format:H:i',
            'HoraSalida' => 'date_format:H:i|after:HoraEntrada',
        ]);*/
      
        alert()->success('Turno Guardado Correctamente');
        
        return redirect()->route('turnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function show(turnos $turnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function edit(turnos $turnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function update(TurnoRequest $request, $id)
    {
        //
        try {
            //code...
            $turnos= request()->except(['_token','_method']);
            turnos::where('id','=',$id)->update($turnos);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Turno Actualizado Correctamente');
        return redirect()->route('turnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        turnos::destroy($id);
        alert()->success(' Turno Eliminado correctamente');
        return redirect('turnos');
    }
}
