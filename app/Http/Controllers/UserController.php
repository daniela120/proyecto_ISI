<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $users=User::paginate(10);
        return view('Usuarios.usuariosindex', compact('users'));
    }

    public function pdf()
    {
        $mytime= Carbon::now("America/Lima");
        $hoy=$mytime->toDateTimeString();
        $direccion="Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101";

        $user = User::paginate();
        $pdf = PDF::loadView('usuarios.userpdf',compact('user','hoy'));
        //$pdf->loadHTML ('<h1>Test</h1>');

        //return $pdf->stream();
        return $pdf->download('___usuarios.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        //$datosUser = request()->all();
        $user = request()->except('_token');
        User::insert($user);
        alert()->success('Usuario guardado correctamente');
        
        return redirect()->route('usuarios.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('user_show'), 403);
        $user = User::findOrFail($id);
        $user->load('roles');
        return view('usuarios.show', compact('user'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)    
    {
        abort_if(Gate::denies('user_edit'), 403);
        $user=User::findOrFail($id);
        //abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$User= request()->except(['_token','_method']);

        //User::where('id','=',$id)->update($User);

        $user = User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        return redirect()->route('usuarios.edit', $user)->with('info','Se asigno los roles correctamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('user_destroy'), 403);
        $user = User::findOrFail($id);
        if (auth()->user()->id == $user->id){
            return redirect()->route('usuarios.usuariosindex');
        }
        
        User::destroy($id);
        
        
        
        return redirect('usuarios')->with('mensaje','Usuario Borrado');



    }
}
