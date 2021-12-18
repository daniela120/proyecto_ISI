<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\pedidos;
use App\Models\detallepedidos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use App\Models\Empleado;
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

        return view('factura.facturasindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos=DB::table('pedidos as p')
           ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
         ->join('empleados as e','e.id','=','p.id_empleado')
          ->join('clientes as c','c.id','=','p.id_cliente')
          ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
          ->select('p.id','p.Fecha','e.Nombre as NombreE','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
         ->where('p.id','=',$id)     
          ->orderby('p.id')
            ->groupBy('p.id','p.Fecha','NombreE','c.Nombre','tp.Nombre_Tipo_Pago','total')
            ->first();

            $detallepedidos=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','dp.Id_Producto')
          ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
           ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
           ->where('dp.pedidos_id','=',$id)
           ->get();    

        $datopedido=$id;
        $acumimpuesto=0;
        $subtotalpedido=0;
        $acumdescuento=0;
        $empleadonombre=$pedidos->NombreE;
        $clientenombre=$pedidos->Nombre;

        foreach ($detallepedidos as $detallepedido ) {
            # code...
            
            if ($detallepedidos->pedidos_id=$id) {
                # code...
                //$acumimpuesto=($detallepedidos->Precio * $detallepedidos->Cantidad)*$detallepedidos->isv;
                
                
                $subtotal=($detallepedido->Precio*$detallepedido->Cantidad );                
                $sumadescuento=($detallepedido->Precio*$detallepedido->Cantidad)*$detallepedido->ValorDescuento;
                $suma=(($detallepedido->Precio*$detallepedido->Cantidad )-(($detallepedido->Precio*$detallepedido->Cantidad )*($detallepedido->ValorDescuento)))*$detallepedido->isv;
                $acumimpuesto=$acumimpuesto+$suma;
                $subtotalpedido=$subtotalpedido+$subtotal;
                $acumdescuento=$acumdescuento+$sumadescuento;
            }
            
        }

        $valortotal=($subtotalpedido-$acumdescuento)+$acumimpuesto;


            $empleado=Empleado::all();  
        
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

       $descuentos=descuentos::all();

       $isv=isv::all();

        $mytime= Carbon::now("America/Lima");
                
        $hoy=$mytime->toDateTimeString();
        
        return view('factura.create')->withAcumimpuesto($acumimpuesto)
        ->withDatopedido($datopedido)->withPedidos($pedidos)
        ->withSubtotalpedido($subtotalpedido)->withEmpleado($empleado)
        ->withHoy($hoy)->withProductos($productos)->withTiposdepago($tiposdepago)
        ->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv)
        ->withAcumdescuento($acumdescuento)->withValortotal($valortotal)
        ->withEmpleadonombre($empleadonombre)->withClientenombre($clientenombre);
   
        
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
