<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::post('/addProduct', [ProductController::class, 'addProductToCart']);
Route::get('/increaseQuantity/{id}', [CartController::class, 'increaseQuantity']);
Route::get('/decreaseQuantity/{id}', [CartController::class, 'decreaseQuantity']);
Route::delete('/deleteProduct/{id}', [CartController::class, 'deleteProduct']);