<?php

use App\Http\Controllers\ProductWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('produk.index');
});

Route::resource('produk', ProductWebController::class)->parameters([
    'produk' => 'produk',
]);