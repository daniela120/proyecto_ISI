<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\pedidos;
use App\Models\detallepedidos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use Illuminate\Support\Collection;
use DB;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado=Empleado::all();  
    
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

        $descuentos=descuentos::all();

        $isv=isv::all();
        
        $pedidos=pedidos::paginate(50);

        return view('factura.pedidosindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
   
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(factura $factura)
    {
        //
    }
}
