<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\inventarios;
use App\Models\proveedores;
use App\Models\categorias;
use Illuminate\Http\Request;
use App\Models\precio_his_inventario;
use App\HTTP\Requests\InventarioRequestt;
use Carbon\Carbon;

use App\Exports\InventariosExport;
use Maatwebsite\Excel\Facades\Excel;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
       
        return Excel::download(new InventariosExport, 'Inventarios.xlsx');
    }

    public function index()
    {
        try {
            //code...
            $inventarios=inventarios::paginate(15);
            $proveedores=proveedores::all();
            $categorias=categorias::all();

             $probando=DB::table('inventarios as i')
            ->join('categorias as c','i.Id_Categoria','=','c.id')
            ->join('proveedores as p','i.Id_Proveedor','=','p.id')
            ->select('i.id','i.NombreInventario','c.Categoria','i.PrecioUnitario','i.CantidadStock','i.StockActual','i.StockMin','i.StockMax','p.NombreCompania','i.Descontinuado','i.Id_Proveedor','Id_Categoria')
            ->orderby('i.id')
            ->groupBy('i.id','i.NombreInventario','c.Categoria','i.PrecioUnitario','i.CantidadStock','i.StockActual','i.StockMin','i.StockMax','p.NombreCompania','i.Descontinuado','i.Id_Proveedor','Id_Categoria')
            ->paginate(25);
            



        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        //dd($probando);
        
        return view('inventarios.Inventariosindex')->withInventarios($inventarios)->withProveedores($proveedores)->withCategorias($categorias);
        //
    }
    public function pdf()
    {
        
        $inventarios = inventarios::paginate();
        $pdf = PDF::loadView('inventarios.pdf',['inventarios'=>$inventarios]);
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        //return view('inventarios.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventarioRequestt $request)
    {
        //
        try {
            //code...
            $inventarios=request()->except('_token');
            inventarios::insert($inventarios);
            $arreglo=inventarios::all();
            $hoy=date('Y-m-d');

            foreach($arreglo as $i){

                if ($i->NombreInventario==$request->NombreInventario and $i->PrecioUnitario==$request->PrecioUnitario ) {
                    $id=$i->id;
                    DB::insert('insert into precio_his_inventarios (id_inventario,FechaInicio,Precio) values (?, ?, ?)', [$id, $hoy,$request->PrecioUnitario]);
           
                }

            }

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Guardado correctamente en inventario');
        return redirect()->route('inventarios.index');

        

        //$precio_his_inventario=request()->except('_token');
        //$inventarios = new precio_his_inventario;
        /*$precio_his_inventario->Precio->=$request->input($inventario 'Precio') 
        $precio_his_inventario->id_inventario=$request->input('id');
        $precio_his_inventario->Precio=$request->get($inventarios->PrecioUnitario);
        */
        //$inventarios->PrecioUnitario=$request->input('Precio');

        /*$precio_his_inventario = new inventario;
        'id' =>$request->get('id');
        'Precio' =>$request->get('PrecioUnitario');
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function show(inventarios $inventarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function edit(inventarios $inventarios)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function update(InventarioRequestt $request, $id)
    {
        //
        try {
            //code...
            $proveedores=proveedores::all();
            $categorias=categorias::all();
            $inventarios= request()->except(['_token','_method']);
            $prueba=inventarios::all();
            inventarios::where('id','=',$id )->update($inventarios);
            $precio_his_inventario=precio_his_inventario::all();
            $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');
            $ayer = new Carbon('yesterday');
            $ayer=$ayer->format('Y-m-d');


            foreach ($prueba as $i ) {
                # code...
                if ($i->id==$id and $i->PrecioUnitario!=$request->PrecioUnitario) {
                    # code...
                    
                   foreach($precio_his_inventario as $valorhistorico){

                    if($valorhistorico->id_inventario==$id and $valorhistorico->FechaInicio==$hoy ){

                        $idcorrecto=$valorhistorico->id;

                        DB::table('precio_his_inventarios')
                        ->where('id', $idcorrecto )
                        ->update(['Precio' =>  $request->PrecioUnitario]);

                    }elseif ($valorhistorico->id_inventario==$id and empty($valorhistorico->FechaFinal)==true ) {
                        # code...
                        $idcorrecto=$valorhistorico->id;

                        DB::table('precio_his_inventarios')
                        ->where('id', $idcorrecto )
                        ->update(['FechaFinal' =>  $ayer]);

                        DB::insert('insert into precio_his_inventarios (id_inventario,FechaInicio,Precio) values (?, ?, ?)', [$id, $hoy,$request->PrecioUnitario]);
                


                    } 

                    
                    




                   }
                        
                       

                    
                   

                   
               
               
               // cargoempleadohistorico::where('id','=',$idcorrecto)->update($valuesupdate);
                    
                    //DB::update('update cargoempleadohistoricos set FechaFinal = $request->FechaContratacion where id = ?', [$idcorrecto]);
                   
            }
        }





        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Inventario Actualizado correctamente');
        return redirect()->route('inventarios.index')->withProveedores($proveedores)->withInventarios($inventarios)->withCategorias($categorias);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            inventarios::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Producto Eliminado correctamente de inventario');
        return redirect('inventarios');
    }
}
