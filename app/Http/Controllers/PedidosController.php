<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\detallepedidos;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\User;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use App\HTTP\Requests\PedidosRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

use Carbon\Carbon;
use PDF;
use Response;
use Illuminate\Support\Collection;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function excel()
    {
        return Excel::download(new PedidosExport, 'pedidos.xlsx');
    }

    public function __construct()
    {
       // $this->middleware('auth');

        //$this->middleware('can:purchases.show')->only(['show']);

        
    }

    


    public function index()
    {
        $empleado=Empleado::all();  
    
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

        $descuentos=descuentos::all();

        $isv=isv::all();
        
        $pedidos=pedidos::paginate(50);

        return view('Pedidos.pedidosindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
   
    }

    public function pdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $pedidos = pedidos::paginate();
        
        $pdf = PDF::loadView('pedidos.pedidospdf',compact('pedidos','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        //return $pdf->stream();
        return $pdf->download('___pedidos.pdf');
        //return view('Proveedores.pdf');
    }


    public function detallepdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $pedidos = pedidos::paginate();
        
        $pdf = PDF::loadView('pedidos.detallepdf',compact('pedidos','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        //return $pdf->stream();
        return $pdf->download('___detallepedidos.pdf');
        //return view('Proveedores.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado=Empleado::all();  

        $user=User::all();
        
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

        $descuentos=descuentos::all();

        $isv=isv::all();

        $mytime= Carbon::now("America/Lima");
                
        $Hoy=$mytime->toDateTimeString();

       // $mytime = Carbon::now();
         //      echo $mytime->toDateTimeString();

       // $empleado=DB::table('empleados as e')->where('')
         //   ->join('productos as pr','pr.id','=','pd.id_producto')
           // ->select('dp.id_pedido','pr.NombreProducto', 'dp.Cantidad','dp.descuento')
            //->where('dp.id_pedido','=',$id)
            //->get(); 

        return view('Pedidos.create')->withEmpleado($empleado)->withUser($user)->withHoy($Hoy)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv);
    }

   
      


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $request)
    {
         
          try {
            //code...
                DB::beginTransaction();
                
                
                
                $mytime= Carbon::now("America/Lima");
                
               $Hoy=$mytime->toDateTimeString();
               //$mytime = Carbon\Carbon::now();
               echo $mytime->toDateTimeString();
                
                DB::insert('insert into pedidos (id_usuario,Fecha,id_tipo_de_pago,id_cliente) values (?, ?, ?, ?)', [$request->get('id_usuario'), $Hoy,$request->get('id_tipo_de_pago'),$request->get('id_cliente')]);
                $data=DB::table('pedidos')->get();
                $last=$data->last();
         
                
                //detalles
                $idProducto=$request->get('idProducto');
                $PrecioUnitario=$request->get('PrecioUnitario');
                $Cantidad=$request->get('CantidadDetalles');
                $id_descuento=$request->get('id_descuento');
                $id_isv=$request->get('id_isv');
            

                $iteraciones=count($idProducto);
                        for ($i=0; $i < $iteraciones; $i++) { 
                            # code...
                            $detalles= new detallepedidos(); 
                            $detalles->pedidos_id=$last->id;
                            $detalles->Id_Producto=$idProducto[$i];
                            $detalles->PrecioUnitario=$PrecioUnitario[$i];
                            $detalles->Cantidad=$Cantidad[$i];
                            $detalles->id_descuento=$id_descuento[$i];
                            $detalles->id_isv=$id_isv[$i];
                            //$detalles->Total=$detalles->PrecioUnitario[$cont] * $detalles->Cantidad[$cont];
                            $detalles->Total=$PrecioUnitario[$i] * $Cantidad[$i] - $id_descuento[$i];
                            $detalles->save();
                            //$cont=$cont+1;
                        }
                   
                   // }
                    
               // } 
                //dd($detalles);
            //dd($pedidos);
                //dd($idProducto,$PrecioUnitario,$Cantidad,$id_descuento,$id_isv);
                //dd($PrecioUnitario);
                //dd($Cantidad);
                DB::commit();

              
            } catch (\Exception $exception) {
                //throw $th;
                return view('errores.errors',['errors'=>$exception->getMessage()]);
               // DB::rollback();
    
           }
          
          
          /** 
           $pedidos=new pedidos;
           $pedidos->id_empleado=$request->get('id_empleado');
           $mytime= Carbon::now("America/Lima");
           $pedidos->Fecha=$mytime->toDateTimeString();
           $pedidos->id_tipo_de_pago=$request->get('id_tipo_de_pago');
           $pedidos->id_cliente=$request->get('id_cliente');
           //$detalles->save();
          
         
           $idProducto=$request->get('idProducto');
           $PrecioUnitario=$request->get('PrecioUnitario');
                $Cantidad=$request->get('CantidadDetalles');
                $id_descuento=$request->get('id_descuento');
                $id_isv=$request->get('id_isv');
                
                $cont = 0;
           while($cont< count($idProducto)){
            $detalles= new detallepedidos(); 
            $detalles->id_pedido=$pedidos->id_pedido;
            $detalles->Id_Producto=$idProducto[$cont];
            $detalles->PrecioUnitario=$PrecioUnitario[$cont];
            $detalles->Cantidad=$Cantidad[$cont];
            $detalles->id_descuento=$id_descuento[$cont];
            $detalles->id_isv=$id_isv[$cont];
            $detalles->Total=$detalles->PrecioUnitario[$cont] * $detalles->Cantidad[$cont];
            //$detalles->save();
            $cont=$cont+1;
        } 
          **/ 
            
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
           ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
         
         ->join('users as u','u.id','=','p.id_usuario')
          ->join('clientes as c','c.id','=','p.id_cliente')
          ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
          ->select('p.id','p.Fecha','u.name as NombreU','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
         ->where('p.id','=',$id)     
          ->orderby('p.id')
            ->groupBy('p.id','p.Fecha','NombreU','c.Nombre','tp.Nombre_Tipo_Pago','total')
            ->first();

       

      $detallepedidos=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','dp.Id_Producto')
          ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
           ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
           ->where('dp.pedidos_id','=',$id)
           ->get();
        
     
     return view('pedidos.show')->withPedidos($pedidos)->withDetallepedidos($detallepedidos);
        
     //  $empleado=Empleado::all();  
        
     //  $productos=productos::all();

     //  $tiposdepago=tiposdepago::all();

     //  $clientes=clientes::all();

     // $descuentos=descuentos::all();

    //  $isv=isv::all();

    //      $pedidos=pedidos::all();

      // return view('Pedidos.show')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv)->withPedidos($pedidos);
  

      // return view("Pedidos.show"); 
       //return view("Pedidos.show",["pedidos"=>$pedidos,"detalles"=>$detalles]);
      // return view('Pedidos.show', compact('pedidos', 'detalles'));
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
   /**
    * 
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

    
    */ 

}