<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel!';
});

Route::get('/about', function () {
    return 'Nama: Raditya Eka Ahmad Febrianto | NIM: 2455201069';
});

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);