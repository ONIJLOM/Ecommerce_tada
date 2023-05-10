<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PesoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\catalogoController;
use App\Http\Controllers\UserBitacoraController;
use App\Http\Controllers\NotaIngresoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\cartClienteController;
use App\Http\Controllers\CartDetailClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\DetalleVentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/contacto', function(){
    return view('pages.contacto');
})->name('contacto');

Route::get('/nosotros', function(){
    return view('pages.nosotros');
})->name('nosotros');

//Reportes

Route::get('factura/reporte', [FacturaController::class, 'reporte'])->name('factura.reporte');

Route::get('administrador/reporte', [AdministradorController::class, 'reporte'])->name('administrador.reporte');

Route::get('cliente/reporte', [ClienteController::class, 'reporte'])->name('cliente.reporte');

Route::get('empleado/reporte', [EmpleadoController::class, 'reporte'])->name('empleado.reporte');

Route::get('role/reporte', [RolController::class, 'reporte'])->name('role.reporte');

Route::get('bitacora/reporte', [UserBitacoraController::class, 'reporte'])->name('bitacora.reporte');

Route::get('tipo/reporte', [TipoController::class, 'reporte'])->name('tipo.reporte');

Route::get('categoria/reporte', [CategoriaController::class, 'reporte'])->name('categoria.reporte');

Route::get('peso/reporte', [PesoController::class, 'reporte'])->name('peso.reporte');

Route::get('producto/reporte', [ProductoController::class, 'reporte'])->name('producto.reporte');

Route::get('notaIngreso/reporte', [NotaIngresoController::class, 'reporte'])->name('notaIngreso.reporte');

Route::get('cartCliente/reporte', [CartClienteController::class, 'reporte'])->name('cartCliente.reporte');

Route::get('notaVenta/reporte', [NotaVentaController::class, 'reporte'])->name('notaVenta.reporte');

Route::get('detalleVenta/reporte', [DetalleVentaController::class, 'reporte'])->name('detalleVenta.reporte');

//Route::get('factura/view', [NotaVentaController::class, 'view'])->name('factura.view');



Route::get('/bitacora', [UserBitacoraController::class, 'index'])->name('bitacora');

Route::get('/catalogo', [catalogoController::class, 'index'])->name('catalogo');

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('loginA');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::resource('administrador',AdministradorController::class)->middleware('auth');

Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Route::resource('cliente',ClienteController::class)->middleware('auth');

Route::resource('tipo',TipoController::class)->middleware('auth');

Route::resource('categoria',CategoriaController::class)->middleware('auth');

Route::resource('peso', PesoController::class)->middleware('auth');

Route::resource('producto', ProductoController::class)->middleware('auth');

Route::resource('notaIngreso', NotaIngresoController::class)->middleware('auth');

Route::resource('role', RolController::class)->middleware('auth');

Route::resource('shoppingCartDetail', ShoppingCartDetailController::class)->middleware('auth');

Route::resource('cartCliente', CartClienteController::class)->middleware('auth');

Route::resource('cartDetailCliente', CartDetailClienteController::class)->middleware('auth');

Route::resource('factura', FacturaController::class)->middleware('auth');

Route::resource('notaVenta', NotaVentaController::class)->middleware('auth');

Route::resource('detalleVenta', DetalleVentaController::class)->middleware('auth');

