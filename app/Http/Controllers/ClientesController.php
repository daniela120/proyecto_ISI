<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\HTTP\Requests\ClientesRequest;
use App\Models\clientes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use PDF;
use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        try{
           return Excel::download(new ClientesExport, 'clientes.xlsx');
        
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
    }

    public function index()
    {
        //
        try {
            //code...
            $users=User::all();

            $clientes=clientes::paginate(10);

            $probando=DB::table('clientes as c')
          //  ->join('users as u','c.Id_Usuario','=','u.id')
            ->select('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->orderby('c.id')
            ->groupBy('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->paginate(25);

        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('clientes.index')->withClientes($clientes)->withUsers($users)->withProbando($probando);
    }

    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Tegucigalpa");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $clientes = clientes::all();
            $users=User::all();   

            $probando=DB::table('clientes as c')
            ->join('users as u','c.Id_Usuario','=','u.id')
            ->select('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->orderby('c.id')
            ->groupBy('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->paginate(25);

        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        //return view('clientes.indexjoin')->withProbando($probando);
        $pdf = PDF::loadView('clientes.clientepdf',compact('clientes','hoy','probando'));


        //$pdf = PDF::loadView('clientes.clientepdf',['clientes'=>$clientes]);
        //return $pdf->stream();
        return $pdf->download('___clientes.pdf');
        //return view('clientes.clientepdf', compact('clientes') );
    }




    public function indexjoin()
    {

        try {
            //code...
            $users=User::all();   

            $clientes=clientes::paginate(10);

            $probando=DB::table('clientes as c')
            ->join('users as u','c.Id_Usuario','=','u.id')
            ->select('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->orderby('c.id')
            ->groupBy('c.id','c.Nombre','c.Apellido','u.name','c.Direccion','c.Telefono','c.FechaNacimiento')
            ->paginate(25);


        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('clientes.indexjoin')->withProbando($probando);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
          return view('clientes.create');
    
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        //
        try {
            //code...
            $clientes = request()->except('_token');
            clientes::insert($clientes);
        
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        
        alert()->success('Categoría Guardada Correctamente');
        
        return redirect()->route('clientes.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /*
        $clientes=clientes::findOrFail($id);

        return view('clientes.edit', compact('clientes') );
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesRequest $request, $id)
    {
            
        //
        try {
            //code...
            $clientes = request()->except(['_token','_method']);
            clientes::where('id','=',$id)->update($clientes);
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Cliente Actualizada Correctamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            clientes::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            Log::channel('Clientes')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Cliente Eliminado Correctamente');
        return redirect('clientes');
    }
}
