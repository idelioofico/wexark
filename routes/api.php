<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PastelController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Pastel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware'=>'auth:sanctum'],function () {

    //Cliente resoure routes
    Route::apiResource('clientes', ClienteController::class);

    //Pastel routes
    Route::prefix('pasteis')->name('pasteis.')->group(function () {
        Route::get('/', [PastelController::class, 'index'])->name('index');
        Route::post('/', [PastelController::class, 'store'])->name('store');
        Route::get('/{pastel}', [PastelController::class, 'show'])->name('show');
        Route::put('/{pastel}', [PastelController::class, 'update'])->name('update');
        Route::delete('/{pastel}', [PastelController::class, 'destroy'])->name('delete');
    });

    //Pedido custom routes
    Route::prefix('pedidos')->name('pedidos.')->group(function () {
        Route::get('/', [PedidoController::class, 'index'])->name('index');
        Route::post('/', [PedidoController::class, 'store'])->name('store');
        Route::get('/{id}', [PedidoController::class, 'show'])->name('show');
        Route::delete('/{id}', [PedidoController::class, 'destroy'])->name('delete');
    });

});
