<?php

use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VentaController;
use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Route as RoutingRoute;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('promociones', PromocionController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('compras', CompraController::class);
    Route::get('/compras/detalleAdd/{compra}', [CompraController::class, 'showADetalle'])->name('aDetalleCompra.show');
    Route::post('/compras/detalleAdd', [CompraController::class, 'storeDetalle'])->name('storeDCompra.store');
    Route::get('/compras/detalleVer/{compra}', [CompraController::class, 'showVDetalle'])->name('vDetalleCompra.show');

    Route::get('/ventas/detalleAddS/{venta}', [VentaController::class, 'showADetalleS'])->name('aDetalleVentaS.show');
    Route::post('/ventas/detalleAddS', [VentaController::class, 'storeDetalleS'])->name('storeDVentaS.store');
    Route::get('/ventas/detalleVerS/{venta}', [VentaController::class, 'showVDetalleS'])->name('vDetalleVentaS.show');

    Route::get('/ventas/detalleAddP/{venta}', [VentaController::class, 'showADetalleP'])->name('aDetalleVentaP.show');
    Route::post('/ventas/detalleAddP', [VentaController::class, 'storeDetalleP'])->name('storeDVentaP.store');
    Route::get('/ventas/detalleVerP/{venta}', [VentaController::class, 'showVDetalleP'])->name('vDetalleVentaP.show');
});


Auth::routes();
