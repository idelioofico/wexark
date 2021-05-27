<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PastelController;
use App\Http\Controllers\PedidoController;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Pastel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Clientes  routes
Route::prefix('clientes')->name('clientes.')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('index');
    Route::post('/store', [ClienteController::class, 'store'])->name('store');
    Route::get('/{cliente}', [ClienteController::class, 'show'])->name('show');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('update');
    Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('delete');
});


//Pasteis Resource routes
Route::apiResource('pasteis',PastelController::class);

//Pedido custom routes
Route::prefix('pedidos')->name('pedidos.')->group(function () {
    Route::get('/', [PedidoController::class, 'index'])->name('index');
    Route::post('/store', [PedidoController::class, 'store'])->name('store');
    Route::get('/{pedido}', [PedidoController::class, 'show'])->name('show');
    Route::put('/{pedido}', [PedidoController::class, 'update'])->name('update');
    Route::delete('/{pedido}', [PedidoController::class, 'destroy'])->name('delete');
});