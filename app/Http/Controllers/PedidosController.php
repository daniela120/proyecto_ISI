<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\detallepedidos;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use App\HTTP\Requests\PedidosRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidosController extends Controller
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
        
        $pedidos=pedidos::paginate(15);

        return view('Pedidos.pedidosindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado=Empleado::all();  
        
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

       $descuentos=descuentos::all();

       $isv=isv::all();

       // $empleado=DB::table('empleados as e')->where('')
         //   ->join('productos as pr','pr.id','=','pd.id_producto')
           // ->select('dp.id_pedido','pr.NombreProducto', 'dp.Cantidad','dp.descuento')
            //->where('dp.id_pedido','=',$id)
            //->get(); 

        return view('Pedidos.create')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $request)
    {
        //
        try {
            //code...
                DB::beginTransaction();
                $pedidos=new pedidos;
                $pedidos->id_empleado=$request->get('id_empleado');
                $mytime= Carbon::now("America/Lima");
                $pedidos->Fecha=$mytime->toDateTimeString();
                $pedidos->id_tipo_de_pago=$request->get('id_tipo_de_pago');
                $pedidos->id_cliente=$request->get('id_cliente');
                $pedidos->save();
                //detalles
                $Id_Producto=$request->get('Id_Producto');
                $PrecioUnitario=$request->get('PrecioUnitario');
                $Cantidad=$request->get('Cantidad');
                $id_descuento=$request->get('id_descuento');
                $id_isv=$request->get('id_isv');
                
                $cont=0;

                while($cont<5){
                    $detalles= new detallepedidos(); 
                    $detalles->id_pedido=$pedidos->$id_pedido; 
                    $detalles->Id_Producto=$Id_Producto[$cont];
                    $detalles->PrecioUnitario=$PrecioUnitario[$cont];
                    $detalles->Cantidad=$Cantidad[$cont];
                    $detalles->id_descuento=$id_descuento[$cont];
                    $detalles->id_isv=$id_isv[$cont];
                    $detalles->save();
                    $cont=$cont+1;
                } 
                DB::commit();

            } catch (\Exception $exception) {
                //throw $th;
                DB::rollback();
               return view('errores.errors',['errors'=>$exception->getMessage()]);
    
            }

        alert()->success('Pedido guardado correctamente');
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos=DB::table('pedidos as p')
            ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_pago')
            ->join('empleados as e','e.id','=','p.id_empleado')
            ->join('clientes as c','c.id','=','p.id_cliente')
            ->join('detallepedidos as dp','p.id_pedido','=','pd.id_pedido')
            ->select('p.id_pedido','p.Fecha','e.Nombre','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
            ->where('p.id_pedido','=',$id)
            ->first();

        $detalles=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','pd.id_producto')
            ->select('dp.id_pedido','pr.NombreProducto', 'dp.Cantidad','dp.descuento')
            ->where('dp.id_pedido','=',$id)
            ->get();     
        return view("Pedidos.create.show",["pedidos"=>$pedidos,"detalles"=>$detalles]);
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
    public function destroy(pedidos $id)
    {
        //
        try {
            //code...
            productos::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        $pedidos=pedidos::findOrFail($id);
        $pedidos->update();
        
        return redirect('pedidos/create');
    }
}
