<?php

use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\PolicyController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TestimonialsController;
use Illuminate\Support\Facades\Route;


// Products API
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');

// Testimonials API
Route::apiResource('testimonials', TestimonialsController::class);

// Settings API
Route::apiResource('settings', SettingController::class);

// Faq API
Route::apiResource('faqs', FaqController::class);

// Policies API
Route::apiResource('policies', PolicyController::class);