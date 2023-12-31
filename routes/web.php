<?php

use App\Http\Controllers\PasajeroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\iniciarSesionController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\CombiController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Chofer1Controller;
use App\Http\Controllers\Pasajero1Controller;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\HomeVisitanteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;

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
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
Route::get('combi19/registro', [PasajeroController::class, 'registro'])->name('combi19.registro');

Route::post('combi19/store', [PasajeroController::class, 'store'])->name('combi19.store');

Route::get('combi19/iniciarSesion', [iniciarSesionController::class, 'iniciarSesion'])->name('combi19.iniciarSesion');

Route::get('combi19/listadoPasajeros{viaje}', [ViajeController::class, 'listadoPasajeros'])->name('combi19.listadoPasajeros');
Route::get('combi19/listarPasajerosReembolso', [ViajeController::class, 'listarPasajerosReembolso'])->name('combi19.listarPasajerosReembolso');

Route::get('combi19/listarImprevistos', [AdminController::class, 'listarImprevistos'])->name('combi19.listarImprevistos');
Route::get('combi19/resolverImprevisto{imprevisto}', [AdminController::class, 'resolverImprevisto'])->name('combi19.resolverImprevisto');

Route::get('combi19/reembolsar{pasaje}', [AdminController::class, 'reembolsar'])->name('combi19.reembolsar');
Route::get('combi19/cobrar{pasaje}', [AdminController::class, 'cobrar'])->name('combi19.cobrar');

Route::get('combi19/registroChofer', [ChoferController::class, 'registroChofer'])->name('combi19.registroChofer');
Route::post('combi19/storeChofer', [ChoferController::class, 'storeChofer'])->name('combi19.storeChofer');
Route::get('combi19/listarChoferes', [ChoferController::class, 'listarChoferes'])->name('combi19.listarChoferes');
Route::delete('combi19/eliminarChofer{chofer}', [ChoferController::class, 'eliminarChofer'])->name('combi19.eliminarChofer');
Route::get('combi19/modificarChofer{chofer}', [ChoferController::class, 'modificarChofer'])->name('combi19.modificarChofer');
Route::put('combi19/updateChofer{chofer}', [ChoferController::class, 'updateChofer'])->name('combi19.updateChofer');

Route::get('combi19/altaCombi', [CombiController::class, 'altaCombi'])->name('combi19.altaCombi');
Route::post('combi19/storeCombi', [CombiController::class, 'storeCombi'])->name('combi19.storeCombi');
//Route::get('combi19/listarCombis', [CombiController::class, 'listarCombis'])->middleware('can:combi19.listarCombis')->name('combi19.listarCombis');
Route::get('combi19/listarCombis', [CombiController::class, 'listarCombis'])->name('combi19.listarCombis');
Route::delete('combi19/eliminarCombi{combi}', [CombiController::class, 'eliminarCombi'])->name('combi19.eliminarCombi');
Route::get('combi19/modificarCombi{combi}', [CombiController::class, 'modificarCombi'])->name('combi19.modificarCombi');
Route::put('combi19/updateCombi{combi}', [CombiController::class, 'updateCombi'])->name('combi19.updateCombi');

Route::get('combi19/altaInsumo', [InsumoController::class, 'altaInsumo'])->name('combi19.altaInsumo');
Route::post('combi19/storeInsumo', [InsumoController::class, 'storeInsumo'])->name('combi19.storeInsumo');
Route::get('combi19/listarInsumosTotal', [InsumoController::class, 'listarInsumosTotal'])->name('combi19.listarInsumosTotal');
Route::delete('combi19/eliminarInsumo{insumo}', [InsumoController::class, 'eliminarInsumo'])->name('combi19.eliminarInsumo');
Route::get('combi19/modificarInsumo{insumo}', [InsumoController::class, 'modificarInsumo'])->name('combi19.modificarInsumo');
Route::put('combi19/updateInsumo{insumo}', [InsumoController::class, 'updateInsumo'])->name('combi19.updateInsumo');

Route::get('combi19/altaLugar', [LugarController::class, 'altaLugar'])->name('combi19.altaLugar');
Route::post('combi19/storeLugar', [LugarController::class, 'storeLugar'])->name('combi19.storeLugar');
Route::get('combi19/listarLugares', [LugarController::class, 'listarLugares'])->name('combi19.listarLugares');
Route::delete('combi19/eliminarLugar{lugar}', [LugarController::class, 'eliminarLugar'])->name('combi19.eliminarLugar');
Route::get('combi19/modificarLugar{lugar}', [LugarController::class, 'modificarLugar'])->name('combi19.modificarLugar');
Route::put('combi19/updateLugar{lugar}', [LugarController::class, 'updateLugar'])->name('combi19.updateLugar');

Route::get('combi19/altaRuta', [RutaController::class, 'altaRuta'])->name('combi19.altaRuta');
Route::post('combi19/storeRuta', [RutaController::class, 'storeRuta'])->name('combi19.storeRuta');
Route::get('combi19/listarRutas', [RutaController::class, 'listarRutas'])->name('combi19.listarRutas');
Route::delete('combi19/eliminarRuta{ruta}', [RutaController::class, 'eliminarRuta'])->name('combi19.eliminarRuta');
Route::get('combi19/modificarRuta{ruta}', [RutaController::class, 'modificarRuta'])->name('combi19.modificarRuta');
Route::get('combi19/modificarRutaConLugar/{ruta}/{lugar?}', [RutaController::class, 'modificarRutaConLugar'])->name('combi19.modificarRutaConLugar');
Route::put('combi19/updateRuta{ruta}', [RutaController::class, 'updateRuta'])->name('combi19.updateRuta');

Route::get('combi19/altaViaje', [ViajeController::class, 'altaViaje'])->name('combi19.altaViaje');
Route::post('combi19/storeViaje', [ViajeController::class, 'storeViaje'])->name('combi19.storeViaje');
Route::get('combi19/listarViajes', [ViajeController::class, 'listarViajes'])->name('combi19.listarViajes');
Route::delete('combi19/eliminarViaje{viaje}', [ViajeController::class, 'eliminarViaje'])->name('combi19.eliminarViaje');
Route::get('combi19/modificarViaje{viaje}', [ViajeController::class, 'modificarViaje'])->name('combi19.modificarViaje');
Route::put('combi19/updateViaje{viaje}', [ViajeController::class, 'updateViaje'])->name('combi19.updateViaje');
});


Route::group(['middleware' => 'pasajero', 'prefix' => 'pasajero', 'namespace' => 'Pasajero'], function () {
Route::get('combi19/modificarDatosDeCuentaPasajero{pasajero}', [PasajeroController::class, 'modificarDatosDeCuentaPasajero'])->name('combi19.modificarDatosDeCuentaPasajero');
Route::put('combi19/updatePasajero{pasajero}', [PasajeroController::class, 'updatePasajero'])->name('combi19.updatePasajero');
Route::post('combi19/updatePasajeroContraseña', [PasajeroController::class, 'updatePasajeroContraseña'])->name('combi19.updatePasajeroContraseña');
Route::get('combi19/suscripcion{pasajero}', [PasajeroController::class, 'suscripcion'])->name('combi19.suscripcion');
Route::post('combi19/storeSuscripcion{pasajero}', [PasajeroController::class, 'storeSuscripcion'])->name('combi19.storeSuscripcion');
Route::get('combi19/modificarTarjeta{pasajero}', [PasajeroController::class, 'modificarTarjeta'])->name('combi19.modificarTarjeta');
Route::put('combi19/updateTarjeta{pasajero}', [PasajeroController::class, 'updateTarjeta'])->name('combi19.updateTarjeta');
Route::get('combi19/prepararCancelacion{pasajero}', [PasajeroController::class, 'prepararCancelacion'])->name('combi19.prepararCancelacion');
Route::get('combi19/eliminarSuscripcion{pasajero}', [PasajeroController::class, 'eliminarSuscripcion'])->name('combi19.eliminarSuscripcion');
Route::get('combi19/perfilDePasajero{pasajero}', [PasajeroController::class, 'perfilDePasajero'])->name('combi19.perfilDePasajero');
Route::get('combi19/misViajes{pasajero}', [PasajeroController::class, 'misViajes'])->name('combi19.misViajes');
Route::get('combi19/realizarComentario', [PasajeroController::class, 'realizarComentario'])->name('combi19.realizarComentario');
Route::post('combi19/storeComentario/{pasaje}/{pasajero}', [PasajeroController::class, 'storeComentario'])->name('combi19.storeComentario');
Route::put('combi19/updateComentario{comentario}/{pasajero}', [PasajeroController::class, 'updateComentario'])->name('combi19.updateComentario');
Route::delete('combi19/eliminarComentario{comentario}/{pasajero}', [PasajeroController::class, 'eliminarComentario'])->name('combi19.eliminarComentario');
Route::post('combi19/reservarPasajeTercero', [PasajeroController::class, 'reservarPasajeTercero'])->name('combi19.reservarPasajeTercero');
Route::get('combi19/cargarDatosTercero{viaje_id}', [PasajeroController::class, 'cargarDatosTercero'])->name('combi19.cargarDatosTercero');
Route::get('combi19/cargarTarjeta', [PasajeroController::class, 'cargarTarjeta'])->name('combi19.cargarTarjeta');
Route::post('combi19/validarTarjeta', [PasajeroController::class, 'validarTarjeta'])->name('combi19.validarTarjeta');
Route::get('combi19/cancelarPasaje{pasaje}', [PasajeroController::class, 'cancelarPasaje'])->name('combi19.cancelarPasaje');
});
Route::get('/buscarViaje', [PasajeroController::class, 'buscarViaje'])->name('buscarViaje');
Route::post('/buscarViajeConDatos', [PasajeroController::class, 'buscarViajeConDatos'])->name('buscarViajeConDatos');
Route::get('/buscarViajeVisitante', [VisitanteController::class, 'buscarViajeVisitante'])->name('buscarViajeVisitante');
Route::post('/buscarViajeVisitanteConDatos', [VisitanteController::class, 'buscarViajeVisitanteConDatos'])->name('buscarViajeVisitanteConDatos');


Route::group(['middleware' => 'chofer', 'prefix' => 'chofer', 'namespace' => 'Chofer'], function () {
Route::get('combi19/modificarDatosDeCuentaChofer{chofer}', [ChoferController::class, 'modificarDatosDeCuentaChofer'])->name('combi19.modificarDatosDeCuentaChofer');
Route::put('combi19/updateChofer2{chofer}', [ChoferController::class, 'updateChofer2'])->name('combi19.updateChofer2');
Route::post('combi19/updateChoferContraseña', [ChoferController::class, 'updateChoferContraseña'])->name('combi19.updateChoferContraseña');
Route::get('combi19/perfilDeChofer{chofer}', [ChoferController::class, 'perfilDeChofer'])->name('combi19.perfilDeChofer');
Route::get('combi19/misViajesChofer', [ChoferController::class, 'misViajesChofer'])->name('combi19.misViajesChofer');
Route::get('combi19/iniciarViaje{viaje}', [ChoferController::class, 'iniciarViaje'])->name('combi19.iniciarViaje');
Route::get('combi19/finalizarViaje{viaje}', [ChoferController::class, 'finalizarViaje'])->name('combi19.finalizarViaje');
Route::get('combi19/listaPasajeros{viaje}', [ChoferController::class, 'listaPasajeros'])->name('combi19.listaPasajeros');
Route::post('combi19/storeExpress{viaje}', [ChoferController::class, 'storeExpress'])->name('combi19.storeExpress');
Route::get('combi19/registroExpress{viaje}', [ChoferController::class, 'registroExpress'])->name('combi19.registroExpress');
Route::get('combi19/cargarSintomas{pasaje}', [ChoferController::class, 'cargarSintomas'])->name('combi19.cargarSintomas');
Route::post('combi19/storeSintomas{pasajero}', [ChoferController::class, 'storeSintomas'])->name('combi19.storeSintomas');
Route::post('combi19/storeImprevisto{viaje}', [ChoferController::class, 'storeImprevisto'])->name('combi19.storeImprevisto');
Route::put('combi19/updateImprevisto{imprevisto}', [ChoferController::class, 'updateImprevisto'])->name('combi19.updateImprevisto');
Route::delete('combi19/eliminarImprevisto{imprevisto}', [ChoferController::class, 'eliminarImprevisto'])->name('combi19.eliminarImprevisto');
});


Route::get('homeGeneral', [HomeVisitanteController::class, 'homeGeneral'])->name('homeGeneral');
Route::resource('/admin', AdminController::class);
Route::resource('/chofer', Chofer1Controller::class);
Route::resource('/pasajero', Pasajero1Controller::class);
Route::resource('/visitante', VisitanteController::class);

Auth::routes();

Route::get('combi19/home', [HomeController::class, 'index'])->name('home');

Route::get('combi19/listarInsumosViaje{viaje_id}/{pasajero_id}', [InsumoController::class, 'listarInsumosViaje'])->name('combi19.listarInsumosViaje');

//Carrito de compras
Route::get('combi19/pagarPasajePobre{tarjeta}', [CartController::class, 'pagarPasajePobre'])->name('combi19.pagarPasajePobre');

Route::get('combi19/eliminarReservaInsumo{insumo_pasaje_id}', [CartController::class, 'eliminarReservaInsumo'])->name('combi19.eliminarReservaInsumo');

Route::get('combi19/pagarPasaje', [CartController::class, 'pagarPasaje'])->name('combi19.pagarPasaje');

Route::post('/cart-add', [CartController::class, 'add'])->name('cart.add');

Route::get('/cart-addViaje{viaje_id}/{esUsuario}', [CartController::class, 'addViaje'])->name('cart.addViaje');

Route::get('/cart-checkout', [CartController::class, 'cart'])->name('cart.checkout');

Route::post('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart-removeitem', [CartController::class, 'removeitem'])->name('cart.removeitem');
