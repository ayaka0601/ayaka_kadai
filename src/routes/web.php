<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/register', [ProductController::class, 'register']);
Route::post('/products/confirm', [ProductController::class, 'confirm']);
Route::post('/products/complete', [ProductController::class, 'complete']);



//Route::post('/products', [ProductController::class, 'create']);