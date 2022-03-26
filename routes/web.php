<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos');
Route::post('/productos/store', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/show/{id}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos.show');
Route::get('/productos/edit/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::post('/productos/update/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::post('/productos/delete/{id}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.delete');



Route::post('/productos/comprar', [App\Http\Controllers\ComprasController::class, 'comprar'])->name('comprar');

Route::get('/compras', [App\Http\Controllers\ComprasController::class, 'index'])->name('compras');
Route::get('/compras/user/{id}', [App\Http\Controllers\ComprasController::class, 'compras_usuarios'])->name('compras.usuarios');
Route::get('/miscompras', [App\Http\Controllers\ComprasController::class, 'miscompras'])->name('compras.usuarios');

Route::post('/compras/generar-factura', [App\Http\Controllers\ComprasController::class, 'generarFactura'])->name('compras.generarFactura');

Route::get('/facturas', [App\Http\Controllers\FacturasController::class, 'index'])->name('facturas');
Route::get('/facturas/show/{id}', [App\Http\Controllers\FacturasController::class, 'show'])->name('facturas.show');





