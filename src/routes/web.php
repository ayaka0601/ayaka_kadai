<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeasonController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/register', [productController::class, 'register']);
Route::post('/products/register', [ProductController::class, 'create']);
Route::post('/products/confirm', [ProductController::class, 'confirm']);
Route::post('products/complete', [ProductController::class, 'store']);
Route::get('/products/update', [ProductController::class, 'edit']);
Route::post('/products/update', [ProductController::class, 'update']);
Route::get('/products/delete', [ProductController::class, 'delete']);
Route::post('/products/delete', [ProductController::class, 'remove']);
Route::get('/products/search', [ProductController::class, 'find']);
Route::post('products/search', [ProductController::class, 'search']);
Route::get('/products/bind', [ProductController::class, 'bind']);

Route::prefix('season')->group(function () {
    Route::get('/products', [SeasonController::class, 'index']);
    Route::get('/products/register', [SeasonController::class, 'add']);
    Route::post('/products/register', [SeasonController::class, 'create']);
});
Route::get('/relation', [productController::class, 'relate']);
