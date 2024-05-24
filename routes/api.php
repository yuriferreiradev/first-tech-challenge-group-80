<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\Api\Client\StoreClientController;

use App\Http\Controllers\Api\Product\{
    IndexProductController,
    StoreProductController,
    UpdateProductController,
    DeleteProductController,
    SearchProductByCategoryController,
};

use App\Http\Controllers\Api\Order\{
    IndexOrderController,
    StoreOrderController,
};

use App\Http\Controllers\Api\Auth\{
    LoginController,
    LogoutController,
};

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
});


Route::post('/clients', StoreClientController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', IndexProductController::class);
        Route::get('/categories/{category}', SearchProductByCategoryController::class);
        Route::post('/', StoreProductController::class);
        Route::patch('/{product}', UpdateProductController::class);
        Route::delete('/{product}', DeleteProductController::class);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', IndexOrderController::class);
        Route::post('/', StoreOrderController::class);
    });
});
