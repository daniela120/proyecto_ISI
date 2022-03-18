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
use App\Models\parametrizacion_factura;
use Illuminate\Support\Collection;
use DB;
use PDF;
use App\Exports\FacturaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        try{
             return Excel::download(new FacturaExport, 'factura.xlsx');
        } catch (\Exception $exception) {
            Log::channel('Factura')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    public function index()
    {
        try {
            $empleado=Empleado::all();  
        
            $productos=productos::all();

            $tiposdepago=tiposdepago::all();

            $clientes=clientes::all();

            $descuentos=descuentos::all();

            $isv=isv::all();
            
            $pedidos=pedidos::paginate(50);

        } catch (\Exception $exception) {
            //throw $th;
            
            Log::channel('Factura')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        return view('factura.facturasindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
        
    }

    public function pdf($id)
    {
        try{
                $empleado=Empleado::all();       
                $productos=productos::all();
                $tiposdepago=tiposdepago::all();
                $clientes=clientes::all();
                $descuentos=descuentos::all();
                $isv=isv::all();
                $parametro=parametrizacion_factura::all();              
                $datapedidos=pedidos::paginate(50);

                $idpedido=$id;
                //$idpedido=42;

                $pedidos=DB::table('pedidos as p')
                ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
                ->join('users as e','e.id','=','p.id_usuario')
                ->join('clientes as c','c.id','=','p.id_cliente')
                ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
                ->select('p.id','p.Fecha','e.name as NombreE','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
                ->where('p.id','=',$idpedido)     
                ->orderby('p.id')
                    ->groupBy('p.id','p.Fecha','NombreE','c.Nombre','tp.Nombre_Tipo_Pago','total')
                    ->first();

                $vigentepedidos=DB::table('detallepedidos as dp')
                ->join('productos as pr','pr.id','=','dp.Id_Producto')
                ->join('descuentos as desc','desc.id','=','dp.id_descuento')
                >join('isvs as i','i.id','=','dp.id_isv')
                ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
                ->where('dp.pedidos_id','=',$idpedido)
                ->get();  

            $datopedido=$idpedido;
                $acumimpuesto=0;
                $subtotalpedido=0;
                $acumdescuento=0;
                $empleadonombre=$pedidos->NombreE;
                $clientenombre=$pedidos->Nombre;

                foreach ($vigentepedidos as $detallepedido ) {
                    # code...      
                    if ($detallepedido->pedidos_id=$idpedido) {
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
                $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $pdf = PDF::loadView('factura.pdf',compact('vigentepedidos','pedidos','datopedido','idpedido','acumimpuesto','subtotalpedido','acumdescuento','empleadonombre','clientenombre','hoy','direccion','valortotal','parametro'));
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();

    } catch (\Exception $exception) {
        Log::channel('Factura')->info($exception->getMessage());
        return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        return $pdf->download('__facturas.pdf');
        //return view('factura.facturasindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
           // return view('factura.pdf',compact('vigentepedidos','pedidos','datopedido','acumimpuesto','subtotalpedido','acumdescuento','empleadonombre','clientenombre','hoy','direccion','valortotal') );
    }


    public function facturapdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $tiposdepago=tiposdepago::all();
            $clientes=clientes::all();
            $empleado=Empleado::all();  

            $pedidos = pedidos::paginate();
            $probando=DB::table('pedidos as p')
            ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
            ->join('users as u','u.id','=','p.id_usuario')
            ->join('clientes as c','c.id','=','p.id_cliente')
            ->select('p.id','u.name','p.Fecha','tp.Nombre_Tipo_Pago','c.Nombre')     
            ->orderby('p.id')
            ->groupBy('p.id','u.name','p.Fecha','tp.Nombre_Tipo_Pago','c.Nombre')
            ->paginate(50);
            
            $pdf = PDF::loadView('factura.facturapdf',compact('pedidos','hoy','probando'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___Facturas.pdf');
            //return view('Proveedores.pdf');
            
        } catch (\Exception $exception) {
            Log::channel('Factura')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pdfindex($id)
    {
        try{
                $empleado=Empleado::all();       
                $productos=productos::all();
                $tiposdepago=tiposdepago::all();
                $clientes=clientes::all();
                $descuentos=descuentos::all();
                $isv=isv::all();
                $parametro=parametrizacion_factura::all();              
                $datapedidos=pedidos::paginate(50);

                $idpedido=$id;
                //$idpedido=42;

                $pedidos=DB::table('pedidos as p')
                ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
                ->join('users as e','e.id','=','p.id_usuario')
                ->join('clientes as c','c.id','=','p.id_cliente')
                ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
                ->select('p.id','p.Fecha','e.name as NombreE','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
                ->where('p.id','=',$idpedido)     
                ->orderby('p.id')
                    ->groupBy('p.id','p.Fecha','NombreE','c.Nombre','tp.Nombre_Tipo_Pago','total')
                    ->first();

                $vigentepedidos=DB::table('detallepedidos as dp')
                ->join('productos as pr','pr.id','=','dp.Id_Producto')
                ->join('descuentos as desc','desc.id','=','dp.id_descuento')
                >join('isvs as i','i.id','=','dp.id_isv')
                ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
                ->where('dp.pedidos_id','=',$idpedido)
                ->get();  

            $datopedido=$idpedido;
                $acumimpuesto=0;
                $subtotalpedido=0;
                $acumdescuento=0;
                $empleadonombre=$pedidos->NombreE;
                $clientenombre=$pedidos->Nombre;

                foreach ($vigentepedidos as $detallepedido ) {
                    # code...      
                    if ($detallepedido->pedidos_id=$idpedido) {
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
                $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $pdf = PDF::loadView('factura.facturasindex',compact('vigentepedidos','pedidos','datopedido','idpedido','acumimpuesto','subtotalpedido','acumdescuento','empleadonombre','clientenombre','hoy','direccion','valortotal','parametro'));
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();

    } catch (\Exception $exception) {
        Log::channel('Factura')->info($exception->getMessage());
        return view('errores.errors',['errors'=>$exception->getMessage()]);

}
        return $pdf->download('__facturas.pdf');
        //return view('factura.facturasindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
           // return view('factura.pdf',compact('vigentepedidos','pedidos','datopedido','acumimpuesto','subtotalpedido','acumdescuento','empleadonombre','clientenombre','hoy','direccion','valortotal') );
    }

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

        $tarjetacredito=$request->get('montodetarjeta');
        $selectpago=$request->get('id_tipo_de_pago');
        $pagoefectivo=$request->get('efectivo');
        $sumapagos=$pagoefectivo+$tarjetacredito;

        $parametro=parametrizacion_factura::all();
        $idpedido=$request->get('inputpedido');
        $pedidos=DB::table('pedidos as p')
            ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_de_pago')
            ->join('users as e','e.id','=','p.id_usuario')
            ->join('clientes as c','c.id','=','p.id_cliente')
            ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
            ->select('p.id','p.Fecha','e.name as NombreE','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
            ->where('p.id','=',$idpedido)     
            ->orderby('p.id')
            ->groupBy('p.id','p.Fecha','NombreE','c.Nombre','tp.Nombre_Tipo_Pago','total')
            ->first();

            $detallepedidos=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','dp.Id_Producto')
          ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
           ->select('dp.pedidos_id','pr.NombreProducto', 'pr.Precio', 'dp.Cantidad','desc.ValorDescuento','i.isv')
           ->where('dp.pedidos_id','=',$idpedido)
           ->get();   
           
           

        $datopedido=$idpedido;
        $acumimpuesto=0;
        $subtotalpedido=0;
        $acumdescuento=0;
        $empleadonombre=$pedidos->NombreE;
        $clientenombre=$pedidos->Nombre;

        foreach ($detallepedidos as $detallepedido ) {
            # code...
            
            if ($detallepedidos->pedidos_id=$idpedido) {
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
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";


        if ($selectpago==1) {
            $campos=[
                
                'efectivo'=>['required','min:0','numeric'],
               ];
               $mensaje=[
                   'required'=>'El :attribute es requerido',
                   
               ];
    
               $this->validate($request,$campos,$mensaje);
        }elseif ($selectpago==2) {
            $campos=[
                'tarjeta' =>['required','digits:16','numeric'],  
                
                
               ];
               $mensaje=[
                   'required'=>'El :attribute es requerido',
                   'tarjeta.required'=>'La tarjeta es requerida'
               ];
    
               $this->validate($request,$campos,$mensaje);
            
        }elseif ($selectpago==3) {
            $campos=[
                'tarjeta' =>['required','digits:16','numeric'],  
                'montodetarjeta'=>['min:2','numeric'],
                'efectivo'=>['required','min:2','numeric'],
               ];
               $mensaje=[
                   'required'=>'El :attribute es solicitado',
                   'tarjeta.required'=>'La tarjeta es requerida'
               ];
    
               $this->validate($request,$campos,$mensaje);
        }

        if ($selectpago==1 and $pagoefectivo<$valortotal ) {
            $campos=[
                
                'efectivo'=>['required','min:0','alpha'],
               ];
               $mensaje=[
                   'efectivo.alpha'=>'El monto es insuficiente',
                   
               ];
    
               $this->validate($request,$campos,$mensaje);

        }elseif ($selectpago==3 and $sumapagos<$valortotal) {
            $campos=[
                'tarjeta' =>['required','digits:16','numeric'],  
                'montodetarjeta'=>['required','min:2','alpha'],
                'efectivo'=>['required','min:2','numeric'],
               ];
               $mensaje=[
                'montodetarjeta.alpha'=>'El monto es insuficiente',
                   'required'=>'El :attribute es requerido',
                   'tarjeta.required'=>'La tarjeta es requerida',
                   
               ];
    
               $this->validate($request,$campos,$mensaje);
        }

        
        $valordemas=$valortotal+500;

        if ($selectpago==3 and $sumapagos>$valordemas) {
            $campos=[
                'tarjeta' =>['required','digits:16','numeric'],  
                'montodetarjeta'=>['required','min:2','alpha'],
                'efectivo'=>['required','min:2','numeric'],
               ];
               $mensaje=[
                'montodetarjeta.alpha'=>'verifique monto a pagar',
                   'required'=>'El :attribute es requerido',
                   'tarjeta.required'=>'La tarjeta es requerida',
                   
               ];
    
               $this->validate($request,$campos,$mensaje);
        }

        $cambio=$sumapagos-$valortotal;


       





        DB::insert('insert into facturas (fecha_factura,direccion,pedido_id,parametrizacion_id) values (?, ?, ?, ?)', [$hoy, $direccion,$datopedido,1]);
        $pdf = PDF::loadView('factura.pdf',compact('detallepedidos','pedidos','datopedido','cambio','idpedido','acumimpuesto','subtotalpedido','acumdescuento','empleadonombre','clientenombre','hoy','direccion','valortotal','parametro'));
        return $pdf->download('__facturas.pdf');
        
       /**  return view('factura.create')->withAcumimpuesto($acumimpuesto)
        ->withDatopedido($datopedido)->withPedidos($pedidos)
        ->withSubtotalpedido($subtotalpedido)->withEmpleado($empleado)
        ->withHoy($hoy)->withProductos($productos)->withTiposdepago($tiposdepago)
        ->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv)
        ->withAcumdescuento($acumdescuento)->withValortotal($valortotal)
        ->withEmpleadonombre($empleadonombre)->withClientenombre($clientenombre)
        ->withDireccion($direccion);
        **/
        return redirect()->route('factura.index');
        


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
         ->join('users as e','e.id','=','p.id_usuario')
          ->join('clientes as c','c.id','=','p.id_cliente')
          ->join('detallepedidos as dp','dp.pedidos_id','=','p.id')
          ->select('p.id','p.Fecha','e.name as NombreE','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
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
