<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\HTTP\Requests\PedidosRequest;

use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleado::all();   

        $tiposdepago=tiposdepago::all();

        $Clientes=clientes::all();
        
        $pedidos=pedidos::paginate(15);

        return view('Pedidos.pedidosindex')->withEmpleado($empleados)->withTipoPagos($tiposdepago)->withClientes($Clientes)->withPedidos($pedidos);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $request)
    {
        $pedidos=request()->except('_token');
        pedidos::insert($pedidos);
        alert()->success('Pedido guardado correctamente');
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedidos $pedidos)
    {
        //
    }
}
