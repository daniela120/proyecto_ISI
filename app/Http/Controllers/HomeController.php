<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /*$request->user()->authorizeRoles(['Cocinero','user','admin']);

        if($request->user()->hasRole('Cocinero')){
            return redirect('/pedidos');
        }else if($request->user()->hasRole('user')){
            return redirect('/BebidasCalientes');
        }
        else
            {
            return view('home.index');
        }

        
        

       /*if(auth()->user()->email = 'miguel@gg.com' ){
            return view('home.index');
       }
       
        return view('/BebidasHeladas');
        */
        return view('home.index');
    }
}
