<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TiposdepagoController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CargoempleadosController;
use App\Http\Controllers\EstadoenviosController;
use App\Http\Controllers\TipodocumentosController;

Route::get('/', function () {
    return view('index');
});

Route::get('/product', function () {
    return view('productos.productosindex');
});

Route::get('/admi', function () {
    return view('indexadmi');
});

Route::get('/admi2', function () {
    return view('layouts.admin');
});

Route::get('/AcercaDeNosotros', function () {
    return view('AcercaDeNosotros');
});

Route::get('/Productos', function () {
    return view('Productos');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/ingresar', function () {
    return view('Usuarios.ingresar');
});
Route::get('/usuariosc', function () {
    return view('Usuarios.modals.create');
});

/* Route::get('/usuario', function () {
    return view('Usuarios.usuariosindex');
}); 

Route::get('/usuarios/create',[UsuariosController::class,'create']);*/


Route::get('/empleados', function () {
    return view('empleados.empleadosindex');
});


Route::get('/Registro', function () {
    return view('Registro');
});

//Haló 7w7
//haló x2
Route::get('/Registro', function () {
    return view('Registro');
});

Route::get('/RecuperarPassword', function () {
    return view('RecuperarPassword');
});

Route::get('/Contacto', function () {
    return view('Contacto');
});

Route::get('/empleadosindex', function () {
    return view('empleados.empleadosindex');
});

Route::get('/usuariosindex', function () {
    return view('Usuarios.usuariosindex');
});




Route::get('/BebidasHeladas', function () {
    return view('BebidasHeladas');
});

Route::get('/BebidasCalientes', function () {
    return view('BebidasCalientes');
});

Route::get('/Postres', function () {
    return view('Postres');
});

Route::get('/servicios', function () {
    return view('servicios');
});
/*
Route::get('/persona', function () {
    return view('persona.indexper');
});*/


//



Route::resource('usuarios', UserController::class);
Route::resource('cargoempleados',CargoempleadosController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('pagos', TiposdepagoController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('documentos', TipodocumentosController::class);
Route::resource('turnos', TurnosController::class);
Route::resource('estadoenvios', EstadoenviosController::class);
//Route::resource('empleado', EmpleadoController::class);

Route::resource('empleado',EmpleadoController::class);
//Route::delete('empleado/{id}/delete', 'App\EmpleadoController@destroy');
//Route::put('empleado/{id}', 'EmpleadoController@update')->name('updateempleado');


//Rutas Creadas por Andres

Route::get('/login', function () {
    return view('auth.login');
});
/** 
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
   
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});


Auth::routes();
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
