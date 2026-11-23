<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Endpoint Category (Tugas 1)
Route::apiResource('categories', CategoryController::class);

// Endpoint Tambahan Soft Delete & Restore (Tugas 3)
Route::get('products/trashed', [ProductController::class, 'trashed']);
Route::post('products/{id}/restore', [ProductController::class, 'restore']);

// Endpoint CRUD Product Utama
Route::apiResource('products', ProductController::class);