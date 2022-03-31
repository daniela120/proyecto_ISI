<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\inventarios;
use App\Models\proveedores;
use App\Models\categorias;
use Illuminate\Support\Facades\Log;
use App\Models\precio_his_inventario;
use App\HTTP\Requests\InventarioRequestt;
use Carbon\Carbon;

class InventariosJoinController extends Controller
{
    

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
            Log::channel('Inventarios')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        //dd($probando);
        
        return view('inventarios.mostrar')->withProbando($probando)->withInventarios($inventarios)->withProveedores($proveedores)->withCategorias($categorias);
        //
    }





}
