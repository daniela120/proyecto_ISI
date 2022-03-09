<?php

namespace App\Http\Controllers;

use App\HTTP\Requests\CargosRequest;
use App\Models\salarioshistoricos;
use App\Models\cargoempleados;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Exports\CargoEmpleadoExport;
use Maatwebsite\Excel\Facades\Excel;

class CargoempleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        return Excel::download(new CargoEmpleadoExport, 'cargoempleados.xlsx');
    }

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

    public function pdf()
    {
        
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $cargoempleados = cargoempleados::paginate();

        $pdf = PDF::loadView('cargoempleados.cargopdf',compact('cargoempleados','hoy'));
        //return $pdf->stream();
        return $pdf->download('___cargoempleado.pdf');
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
            $arreglo=cargoempleados::all();
            $hoy=date('Y-m-d');

           
            foreach ($arreglo as $i ) {
                if ($i->Cargo==$request->Cargo and $i->Salario==$request->Salario ) {
                    $id=$i->id;
                    DB::insert('insert into salarioshistoricos (id_cargo,FechaInicio,Sueldo) values (?, ?, ?)', [$id, $hoy,$request->Salario]);
               
                }
            }

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
            
            $cargodatos= request()->except(['_token','_method']);
            $prueba=cargoempleados::all();
            cargoempleados::where('id','=',$id )->update($cargodatos);
            $salarioshistoricos=salarioshistoricos::all();
            $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');
            $ayer = new Carbon('yesterday');
            $ayer=$ayer->format('Y-m-d');


            foreach ($prueba as $i ) {
                # code...
                if ($i->id==$id and $i->Salario!=$request->Salario) {
                    # code...
                    
                   foreach($salarioshistoricos as $valorhistorico){

                    if($valorhistorico->id_cargo==$id and $valorhistorico->FechaInicio==$hoy ){

                        $idcorrecto=$valorhistorico->id;

                        DB::table('salarioshistoricos')
                        ->where('id', $idcorrecto )
                        ->update(['Sueldo' => $request->Salario]);

                    }elseif ($valorhistorico->id_cargo==$id and empty($valorhistorico->FechaFinal)==true ) {
                        # code...
                        $idcorrecto=$valorhistorico->id;

                        DB::table('salarioshistoricos')
                        ->where('id', $idcorrecto )
                        ->update(['FechaFinal' =>  $ayer]);

                        DB::insert('insert into salarioshistoricos (id_cargo,FechaInicio,Sueldo) values (?, ?, ?)', [$id, $hoy,$request->Salario]);
                


                    } 

                    
                    




                   }
                        
                       

                    
                   

                   
               
               
               // cargoempleadohistorico::where('id','=',$idcorrecto)->update($valuesupdate);
                    
                    //DB::update('update cargoempleadohistoricos set FechaFinal = $request->FechaContratacion where id = ?', [$idcorrecto]);
                   
            }
        }





            $cargoempleados= request()->except(['_token','_method']);
            cargoempleados::where('id','=',$id)->update($cargoempleados);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Cargo Actualizado correctamente');
        return redirect()->route('cargoempleados.index')->withCargodatos($cargodatos)->withSalarioshistoricos($salarioshistoricos);
        //
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