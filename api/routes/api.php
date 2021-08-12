<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('/v1')->group(function () {
   
   Route::get('/products', [ProductController::class, 'index']);
   Route::get('/product/{id}', [ProductController::class, 'show']);
   Route::post('/product', [ProductController::class, 'store']);
   Route::put('/product/{id}', [ProductController::class, 'update']);
   Route::delete('/product/{id}', [ProductController::class, 'delete']);
   
   
});