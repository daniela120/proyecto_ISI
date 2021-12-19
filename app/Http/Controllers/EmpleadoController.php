<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\cargoempleados;
use App\Models\tipodocumentos;
use App\Models\turnos;
use App\Models\cargoempleadohistorico;
use App\Models\User;
use App\HTTP\Requests\EmpleadoRequest;
use Carbon\Carbon;


class EmpleadoController extends Controller
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
            $users=User::all();   

            $turnos=turnos::all();
    
            $cargos=cargoempleados::all();
            
            $empleados=Empleado::paginate(15);
    
            $documentos=tipodocumentos::all();
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('empleado.Empleadoindex')->withCargos($cargos)->withDocumentos($documentos)->withEmpleados($empleados)->withTurnos($turnos)->withUsers($users);
    }


    public function indexjoin()
    {

        try {
            //code...
            $users=User::all();   

            $turnos=turnos::all();
    
            $cargos=cargoempleados::all();
            
            $empleados=Empleado::paginate(15);
    
            $documentos=tipodocumentos::all();
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('empleado.indexjoin')->withCargos($cargos)->withDocumentos($documentos)->withEmpleados($empleados)->withTurnos($turnos)->withUsers($users);
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
    public function store(EmpleadoRequest $request)
    {

        try {
            //code...
            $empleado=request()->except('_token');
            Empleado::insert($empleado);
            $arreglo=Empleado::all();

            foreach($arreglo as $i){

                if ($i->Nombre==$request->Nombre and $i->documento==$request->documento and $i->Apellido==$request->Apellido) {
                    $id=$i->id;
                    DB::insert('insert into cargoempleadohistoricos (id_empleado,id_cargo,FechaInicio) values (?, ?, ?)', [$id, $request->Id_Cargo,$request->FechaContratacion]);
           
                }

            }

           
            
            //$id=$ultimo->id;

           
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
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

        try {
            //code...
            $empleados=Empleado::findOrFail( $id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       

        return view('empleado.edit',compact('empleados'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request,  $id)
    {

        try {
            //code...
            $users=User::all();   

            $turnos=turnos::all();
    
            $cargos=cargoempleados::all();
            $documentos=tipodocumentos::all();   
            $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');
            $ayer = new Carbon('yesterday');
            $ayer=$ayer->format('Y-m-d');         
            $values=[$id,$request->Id_Cargo,$request->FechaContratacion];
            $valuesupdate=[$id,$request->Id_Cargo,$request->FechaContratacion,$hoy];
            $prueba=Empleado::all();
            $empleados= request()->except(['_token','_method']);
            Empleado::where('id','=',$id)->update($empleados);
            $cargoempleadohistorico=cargoempleadohistorico::all();
           

            foreach ($prueba as $i ) {
                # code...
                if ($i->id==$id and $i->Id_Cargo!=$request->Id_Cargo) {
                    # code...
                    
                   foreach($cargoempleadohistorico as $valorhistorico){



                    if ($valorhistorico->id_empleado==$id and $valorhistorico->FechaInicio==$hoy) {
                        # code...
                        $idcorrecto=$valorhistorico->id;

                        DB::table('cargoempleadohistoricos')
                        ->where('id', $idcorrecto )
                        ->update(['id_cargo' =>  $request->Id_Cargo]);

                       
                    }

                    elseif($valorhistorico->id_empleado==$id and $valorhistorico->FechaInicio!=$hoy and empty($valorhistorico->FechaFinal)==true ) {

                        $idcorrecto=$valorhistorico->id;

                        DB::table('cargoempleadohistoricos')
                        ->where('id', $idcorrecto )
                        ->update(['FechaFinal' =>  $ayer]);

                        DB::insert('insert into cargoempleadohistoricos (id_empleado,id_cargo,FechaInicio) values (?, ?, ?)', [$id, $request->Id_Cargo,$hoy]);
                   
                    }






                   
                    

                   }
                        
                       

                    
                   

                   
               
               
               // cargoempleadohistorico::where('id','=',$idcorrecto)->update($valuesupdate);
                    
                    //DB::update('update cargoempleadohistoricos set FechaFinal = $request->FechaContratacion where id = ?', [$idcorrecto]);
                   
            }
        }
           
            
            //cargoempleadohistorico::insert('insert into cargoempleadohistorico (id_empleado,id_cargo,FechaInicio) Values("$id","$request->Id_Cargo","$request->FechaContratacion")');
            //cargoempleadohistoricoDB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }

       
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

        try {
            //code...
            Empleado::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        alert()->success('Empleado Eliminado correctamente');
        return redirect('empleado');
    }
}
