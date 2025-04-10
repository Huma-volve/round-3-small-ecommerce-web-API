<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;


// Products API
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
