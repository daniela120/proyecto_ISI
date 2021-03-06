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
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\InventariosJoinController;
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\DetallePedidosController;
use App\Http\Controllers\PrecioHisInventarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\IsvController;
use App\Http\Controllers\cargoempleadohistoricoController;
use App\Http\Controllers\PrecioHisMenuController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ParametrizacionFacturaController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\SalarioshistoricosController;

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

//Hal?? 7w7
//hal?? x2
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

Route::get('/roleuser', function () {
    return view('Roleuser.roleuserindex');
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

Route::get('factura/pdf',[App\Http\Controllers\FacturaController::class, 'pdf'])->name('factura.pdf');
Route::get('empleado/indexjoin', [App\Http\Controllers\EmpleadoController::class, 'indexjoin'])->name('empleado.indexjoin');
Route::get('productos/indexjoin', [App\Http\Controllers\ProductosController::class, 'indexjoin'])->name('productos.indexjoin');
Route::get('clientes/indexjoin', [App\Http\Controllers\ClientesController::class, 'indexjoin'])->name('clientes.indexjoin');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('historicopreciomenu', PrecioHisMenuController::class);
    //Route::resource('usuarios', UserController::class);
    Route::resource('cargoempleados',CargoempleadosController::class);
    Route::resource('clientes', ClientesController::class);
    Route::resource('pagos', TiposdepagoController::class);
    Route::resource('categorias', CategoriasController::class);
    Route::resource('documentos', TipodocumentosController::class);
    Route::resource('turnos', TurnosController::class);
    Route::resource('estadoenvios', EstadoenviosController::class);
    //Route::resource('empleado', EmpleadoController::class);
    Route::resource('proveedores', ProveedoresController::class);
    Route::resource('empleado',EmpleadoController::class);
    Route::resource('descuentos',DescuentosController::class);
    Route::resource('inventarios',InventariosController::class);
    Route::resource('mostrarinventario', InventariosJoinController::class);       
    Route::resource('pedidos',PedidosController::class);
    Route::resource('precioinventario',PrecioHisInventarioController::class);
    Route::resource('productos',ProductosController::class);
    Route::resource('isv',IsvController::class);
    Route::resource('cargoempleadohistorico',cargoempleadohistoricoController::class);
    Route::resource('factura',FacturaController::class);
    Route::resource('parametrizacionfactura',ParametrizacionFacturaController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);



//Rutas User Controller
Route::get('/usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');

Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.usuariosindex');
Route::get('/usuarios/{usuario}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.delete');


});

//Route::delete('empleado/{id}/delete', 'App\EmpleadoController@destroy');
//Route::put('empleado/{id}', 'EmpleadoController@update')->name('updateempleado');
Route::resource('salario',SalarioshistoricosController::class);

/**Route::get('errors', function(){ 
    abort(500);
});
**/
Route::get('cliente/clientepdf',[App\Http\Controllers\ClientesController::class, 'pdf'])->name('clientes/clientepdf');
    /*return view('BebidasCalientes');
});*/
Route::get('cargoempleadohistoricos/cargohispdf',[App\Http\Controllers\cargoempleadohistoricoController::class, 'pdf'])->name('cargoempleadohistorico.cargohispdf');
Route::get('descuento/descuentopdf',[App\Http\Controllers\DescuentosController::class, 'pdf'])->name('descuentos.descuentopdf');
Route::get('cargoempleado/cargopdf',[App\Http\Controllers\CargoempleadosController::class, 'pdf'])->name('cargoempleados.cargopdf');
Route::get('categoria/categoriapdf',[App\Http\Controllers\CategoriasController::class, 'pdf'])->name('categorias.categoriapdf');
Route::get('empleados/empleadopdf',[App\Http\Controllers\EmpleadoController::class, 'pdf'])->name('empleado.empleadopdf');
Route::get('estadoenvio/estadoenviopdf',[App\Http\Controllers\EstadoenviosController::class, 'pdf'])->name('estadoenvios.estadoenviopdf');
Route::get('inventario/inventariopdf',[App\Http\Controllers\InventariosController::class, 'pdf'])->name('inventarios.inventariopdf');
Route::get('isvs/isvpdf',[App\Http\Controllers\IsvController::class, 'pdf'])->name('isv.isvpdf');

Route::get('preciohistoricomenus/preciohismenupdf',[App\Http\Controllers\PrecioHisMenuController::class, 'pdf'])->name('preciohistoricomenu.preciohismenupdf');
Route::get('precioinventarios/precioinventariopdf',[App\Http\Controllers\PrecioHisInventarioController::class, 'pdf'])->name('precioinventario.precioinventariopdf');
Route::get('salarioshistorico/salariohispdf',[App\Http\Controllers\SalarioshistoricosController::class, 'pdf'])->name('salarioshistoricos.salariohispdf');

Route::get('pedido/pedidospdf',[App\Http\Controllers\PedidosController::class, 'pdf'])->name('pedidos.pedidospdf');
Route::get('facturas/facturapdf',[App\Http\Controllers\FacturaController::class, 'facturapdf'])->name('factura.facturapdf');
Route::get('pedido/detallepdf',[App\Http\Controllers\PedidosController::class, 'detallepdf'])->name('pedidos.detallepdf');

Route::get('producto/productopdf',[App\Http\Controllers\ProductosController::class, 'pdf'])->name('productos.productopdf');
Route::get('proveedor/proveedorpdf',[App\Http\Controllers\ProveedoresController::class, 'pdf'])->name('proveedores.proveedorpdf');
Route::get('documento/documentopdf',[App\Http\Controllers\TipodocumentosController::class, 'pdf'])->name('documentos.documentopdf');
Route::get('pago/pagopdf',[App\Http\Controllers\TiposdepagoController::class, 'pdf'])->name('pagos.pagopdf');
Route::get('turno/turnopdf',[App\Http\Controllers\TurnosController::class, 'pdf'])->name('turnos.turnopdf');
Route::get('usuario/userpdf',[App\Http\Controllers\UserController::class, 'pdf'])->name('usuarios.userpdf');



//borrar despues
/*Route::get('cliente/clientepdf', function () {
    return view('clientes/clientepdf');
});*/




//Rutas Creadas por Andres

Route::get('/login', function () {
    return view('auth.login');
});
/*
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


Route::get('/pedidos/{pedidos}', [App\Http\Controllers\PedidosController::class, 'show'])->name('pedidos.show');
Route::get('/factura/{pedidos}', [App\Http\Controllers\FacturaController::class, 'show'])->name('factura.show');




//
//
//EXCEL
Route::get('producto/excel',[App\Http\Controllers\ProductosController::class, 'excel'])->name('productos.excel');
Route::get('proveedor/excel',[App\Http\Controllers\ProveedoresController::class, 'excel'])->name('proveedores.excel');
Route::get('descuento/excel',[App\Http\Controllers\DescuentosController::class, 'excel'])->name('descuentos.excel');
Route::get('categoria/excel',[App\Http\Controllers\CategoriasController::class, 'excel'])->name('categorias.excel');
Route::get('inventario/excel',[App\Http\Controllers\InventariosController::class, 'excel'])->name('inventarios.excel');
Route::get('cliente/excel',[App\Http\Controllers\ClientesController::class, 'excel'])->name('clientes.excel');
Route::get('estadoenvio/excel',[App\Http\Controllers\EstadoenviosController::class, 'excel'])->name('estadoenvios.excel');
Route::get('turno/excel',[App\Http\Controllers\TurnosController::class, 'excel'])->name('turnos.excel');
Route::get('tiposdepago/excel',[App\Http\Controllers\TiposdepagoController::class, 'excel'])->name('tiposdepago.excel');
Route::get('tipodocumentos/excel',[App\Http\Controllers\TipodocumentosController::class, 'excel'])->name('tipodocumentos.excel');
Route::get('user/excel',[App\Http\Controllers\UserController::class, 'excel'])->name('user.excel');
Route::get('isvs/excel',[App\Http\Controllers\IsvController::class, 'excel'])->name('isv.excel');
Route::get('salarioshistoricos/excel',[App\Http\Controllers\SalarioshistoricosController::class, 'excel'])->name('salarioshistoricos.excel');
Route::get('cargoempleado/excel',[App\Http\Controllers\CargoempleadosController::class, 'excel'])->name('cargoempleados.excel');
Route::get('cargoempleadohistoricos/excel',[App\Http\Controllers\cargoempleadohistoricoController::class, 'excel'])->name('cargoempleadohistorico.excel');
Route::get('precioinventarios/excel',[App\Http\Controllers\PrecioHisInventarioController::class, 'excel'])->name('precioinventario.excel');
Route::get('preciohistoricomenus/excel',[App\Http\Controllers\PrecioHisMenuController::class, 'excel'])->name('preciohistoricomenu.excel');
Route::get('empleados/excel',[App\Http\Controllers\EmpleadoController::class, 'excel'])->name('empleado.excel');
Route::get('pedido/excel',[App\Http\Controllers\PedidosController::class, 'excel'])->name('pedidos.excel');
Route::get('facturas/excel',[App\Http\Controllers\FacturaController::class, 'excel'])->name('factura.excel');
//Route::get('pedido/exceld',[App\Http\Controllers\PedidosController::class, 'exceldetalles'])->name('pedidos.exceld');
Route::get('/pedidos/exceld/{pedidos}', [App\Http\Controllers\PedidosController::class, 'exceldetalles'])->name('pedidos.exceld');
//Route::get('productos/excel', 'ProductosController@exportExcel')->name('productos.excel');

