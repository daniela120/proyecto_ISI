<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\cargoempleados;
use App\Models\tipodocumentos;
use App\Models\turnos;
use App\Models\User;


class EmpleadoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();   

        $turnos=turnos::all();

        $cargos=cargoempleados::all();
        
        $empleados=Empleado::paginate(10);

        $documentos=tipodocumentos::all();
        return view('empleado.Empleadoindex')->withCargos($cargos)->withDocumentos($documentos)->withEmpleados($empleados)->withTurnos($turnos)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('empleado.create');
        //return view('empleado.create')->with('cargoempleadoss',$cargoempleadoss );
      //return view('empleado.create',compact('cargoempleado','cargoempleadoss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado=request()->except('_token');
        Empleado::insert($empleado);
        alert()->success('Empleado guardado correctamente');
        return redirect()->route('empleado.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit( Empleado $empleado)
    {
        //
        $empleados=Empleado::findOrFail( $id);

        return view('empleado.edit',compact('empleados'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $users=User::all();   

        $turnos=turnos::all();

        $cargos=cargoempleados::all();
        $documentos=tipodocumentos::all();
        
        $empleados= request()->except(['_token','_method']);
        Empleado::where('id','=',$id)->update($empleados);
        alert()->success('Empleado Actualizado correctamente');
        
      //  $empleados=Empleado::findOrFail( $id);

      return redirect()->route('empleado.index')->withCargos($cargos)->withDocumentos($documentos)->withEmpleados($empleados)->withTurnos($turnos)->withUsers($users);;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Empleado::destroy($id);
        alert()->success('Empleado Eliminado correctamente');
        return redirect('empleado');
    }
}
