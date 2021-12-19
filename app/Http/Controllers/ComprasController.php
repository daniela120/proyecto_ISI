<?php

namespace App\Http\Controllers;

use App\Models\compras;
use App\Models\proveedores;
use App\Models\isv;
use App\Models\descuentos;
use App\Models\inventarios;
use App\HTTP\Requests\ComprasRequest;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventarios=inventarios::all();
        $proveedores=proveedores::all();
        $descuentos=descuentos::all();
        $isv=isv::all();

        $datos['Compras']=Compras::paginate(10);
        
       
        return view('Compras.index',$datos)->withInventario($inventarios)->withProveedores($proveedores)->withDescuentos($descuentos)->withIsv($isv);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $inventarios=inventarios::all();
        $isv=isv::all();
        $descuentos=descuentos::all();
        $proveedores=proveedores::all();
        return view('Compras.create',$datos)->withInventario($inventarios)->withProveedores($proveedores)->withDescuentos($descuentos)->withIsv($isv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComprasRequest $request)
    {
        //
        DB::beginTransaction();

        $mytime= Carbon::now("America/Lima");
        
        DB::insert('insert into compras (Fecha,HoraPedido,HoraRecibido,Id_Proveedor, Descripcion_Compra) values (?, ?, ?, ?, ?)', [$request->get('Id_Proveedor')]);
                $data=DB::table('compras')->get();
                $last=$data->last();

        $proveedores->$request->get(Id_Proveedor);

        //Detalle
        $Id_Inventario=$request->get('Id_Inventario');
        $Precio=$request->get('Precio');
        $Cantidad=$request->get('CantidadDetalles');
        $id_descuento=$request->get('id_descuento');
        $id_isv=$request->get('id_isv');

        $iteraciones=count($Id_Inventario);
        for ($i=0; $i < $iteraciones; $i++) { 
            # code...
            $detalles= new detallecompras(); 
            $detalles->compras_id=$last->id;
            $detalles->IdInventario=$Id_Inventario[$i];
            $detalles->Precio=$Precio[$i];
            $detalles->Cantidad=$Cantidad[$i];
            $detalles->id_descuento=$id_descuento[$i];
            $detalles->id_isv=$id_isv[$i];
            //$detalles->Total=$detalles->PrecioUnitario[$cont] * $detalles->Cantidad[$cont];
            $detalles->Total=$Precio[$i] * $Cantidad[$i] - $id_descuento[$i];
            $detalles->save();
            //$cont=$cont+1;
        }
        DB::commit();

        return view('Compras.create')->withHoy($Hoy)->withProveedores($proveedores)->withDescuentos($descuentos)->withIsv($isv);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $compras=DB::table('compras as p')
           //->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
         //->join('empleados as e','e.id','=','p.id_empleado')
          ->join('proveedores as c','c.id','=','p.Id_Proveedor')
          ->join('detallecompras as dp','dp.compras_id','=','p.id')
          ->select('p.id','p.Fecha','p.HoraPedido','HoraRecibido','c.NombreCompañia as NombreP','p.Descripcion_Compra',DB::raw('sum(dp.Cantidad*Precio) as total'))
         ->where('p.id','=',$id)     
          ->orderby('p.id')
            ->groupBy('p.id','p.Fecha','p.HoraPedido','HoraRecibido','c.NombreCompañia as NombreP','p.Descripcion_Compra','total')
            ->first();


        $detallecompras=DB::table('detallecompras as dp')
            ->join('inventario as pr','pr.id','=','dp.Id_Inventario')
          ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
           ->select('dp.compras_id','pr.NombreInventario', 'pr.PrecioUnitario', 'dp.Cantidad','desc.ValorDescuento','i.isv')
           ->where('dp.compras_id','=',$id)
           ->get();    
        
     
     return view('compras.show')->withCompras($compras)->withDetallecompras($detallecompras);

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function edit(compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(compras $compras)
    {
        //
    }
}
