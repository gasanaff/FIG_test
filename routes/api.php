<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\StoreController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(StoreController::class)->group(function () {
    Route::get('stores', 'index')
        ->name('stores.index');
    Route::get('stores/{store}', 'show')
        ->where('store', '[0-9]+')
        ->name('stores.show');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'index')
        ->name('products.index');
    Route::get('products_with_user_only', 'products_with_user_only')
        ->name('products.products_with_user_only');
    Route::get('products/{product}', 'show')
        ->where('product', '[0-9]+')
        ->name('products.show');
});
