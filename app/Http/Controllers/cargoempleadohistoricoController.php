<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cargoempleadohistorico;

class cargoempleadohistoricoController extends Controller
{
    //

    public function index()
    {

        try {
            //code...
            
            
            $cargoempleadoshistorico=cargoempleadohistorico::paginate(15);
    
            
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        return view('cargoempleadohistorico.index')->withCargoempleadoshistorico($cargoempleadoshistorico);
    }




}
