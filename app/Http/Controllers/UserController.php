<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use App\Exports\UserExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        try{
            return Excel::download(new UserExport, 'user.xlsx');
                
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    public function index()
    {
        try{
            $datos['Users']=User::paginate(10);
            return view('Usuarios.usuariosindex',$datos);
                    
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    public function pdf()
    {
        try{
            $mytime= Carbon::now("America/Lima");
            $hoy=$mytime->toDateTimeString();
            $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

            $User = User::paginate();
            $pdf = PDF::loadView('usuarios.userpdf',compact('User','hoy'));
            //$pdf->loadHTML ('<h1>Test</h1>');

            //return $pdf->stream();
            return $pdf->download('___usuarios.pdf');
                    
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return view('Usuarios.create');
                
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            //$datosUser = request()->all();
            $User = request()->except('_token');
            user::insert($User);
            alert()->success('Usuario guardado correctamente');
            
            return redirect()->route('usuarios.index');
                    
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$User=User::findOrFail($User);
        return redirect()->route('usuarios.index');*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try{
            
            $User= request()->except(['_token','_method']);
            /*User::where('id','=',$User)->update($User);*/
            User::where('id','=',$id)->update($User);
        /*$User = request()->except('_token');
            User::update($User);
            /*$User=User::findOrFail($User);*/
            alert()->success('Usuario Actualizado correctamente');
            return redirect()->route('usuarios.index');

                
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::destroy($id);
                    
        } catch (\Exception $exception) {
            Log::channel('User')->info($exception->getMessage());
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
        return redirect('usuarios')->with('mensaje','Usuario Borrado');

    }
}
