<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\productos;
use App\Models\precio_his_menu;
use Illuminate\Http\Request;
use App\Models\categorias;
use App\HTTP\Requests\ProductoRequest;
use Carbon\Carbon;

use App\Exports\ProductosExport;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }
    public function index()
    {
        //
        try {
            //code...
            $productos=productos::paginate(15);
            $categorias=categorias::all();
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('productos.productosindex')->withProductos($productos)->withCategorias($categorias);
        //
    }

    public function pdf()
    {
        
        $productos = productos::paginate();
        $pdf = PDF::loadView('productos.pdf',['productos'=>$productos]);
        //$pdf->loadHTML ('<h1>Test</h1>');

        return $pdf->stream();
        //return view('isv.pdf');
    }


    public function indexjoin()
    {
        //
        try {
            //code...
            $productos=productos::paginate(15);
            $categorias=categorias::all();

            $probando=DB::table('productos as p')
            ->join('categorias as c','p.id_Categoria','=','c.id')            
            ->select('p.id','p.NombreProducto','p.Descripcion','c.Categoria','p.Precio')
            ->orderby('p.id')
            ->groupBy('p.id','p.NombreProducto','p.Descripcion','c.Categoria','p.Precio')
            ->paginate(25);

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('productos.indexjoin')->withProbando($probando);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        //
        try {
            //code...
            $productos=request()->except('_token');
            productos::insert($productos);
            $arreglo=productos::all();
            $hoy=date('Y-m-d');
            foreach($arreglo as $i){

                if ($i->NombreProducto==$request->NombreProducto and $i->Precio==$request->Precio) {
                    $id=$i->id;
                    DB::insert('insert into precio_his_menus (id_producto,Precio,FechaInicio) values (?, ?, ?)', [$id, $request->Precio,$hoy]);
           
                }

            }

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Guardado correctamente en Productos');
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        //
        try {
            //code...
            $categorias=categorias::all();
            $productos= request()->except(['_token','_method']);
            $hoy= Carbon::now();
            $hoy = $hoy->format('Y-m-d');
            $prueba=productos::all();
            productos::where('id','=',$id )->update($productos);
            $preciomenuhistorico=precio_his_menu::all();
            $ayer = new Carbon('yesterday');
            $ayer=$ayer->format('Y-m-d');


            foreach ($prueba as $i ) {
                # code...
                if ($i->id==$id and $i->Precio!=$request->Precio) {
                    # code...
                    
                   foreach($preciomenuhistorico as $valorhistorico){

                    if($valorhistorico->id_producto==$id and $valorhistorico->FechaInicio==$hoy ){

                        $idcorrecto=$valorhistorico->id;

                        DB::table('precio_his_menus')
                        ->where('id', $idcorrecto )
                        ->update(['Precio' =>$request->Precio]);

                    }elseif ($valorhistorico->id_producto==$id and empty($valorhistorico->FechaFinal)==true ) {
                        # code...
                        

                        $idcorrecto=$valorhistorico->id;

                        DB::table('precio_his_menus')
                        ->where('id', $idcorrecto )
                        ->update(['FechaFinal' =>  $ayer]);

                        DB::insert('insert into precio_his_menus (id_producto,Precio,FechaInicio) values (?, ?, ?)', [$id, $request->Precio,$hoy]);
           


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
       
        alert()->success('Producto Actualizado Correctamente');
        return redirect()->route('productos.index')->withProductos($productos)->withCategorias($categorias);
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            productos::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Producto Eliminado Correctamente');
        return redirect('productos');
    }
}
