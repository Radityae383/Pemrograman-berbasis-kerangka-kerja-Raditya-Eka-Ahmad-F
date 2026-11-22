<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel!';
});

Route::get('/products', function () {
    return response()->json([
        ['id' => 1, 'nama' => 'Kopi Arabika', 'harga' => 45000],
        ['id' => 2, 'nama' => 'Teh Hijau', 'harga' => 25000],
    ]);
});

Route::get('/about', function () {
    return 'Nama: Raditya Eka Ahmad Febrianto | NIM: 2455201069 ';
});

Route::get('/categories', function () {
    return response()->json([
        ['id' => 1, 'nama' => 'Kopi'],
        ['id' => 2, 'nama' => 'Teh'],
        ['id' => 3, 'nama' => 'Snack'],
    ]);
});

Route::get('/products/{id}', function ($id) {
    $products = [
        ['id' => 1, 'nama' => 'Kopi Arabika', 'harga' => 45000],
        ['id' => 2, 'nama' => 'Teh Hijau', 'harga' => 25000],
    ];

    foreach ($products as $product) {
        if ((int) $product['id'] === (int) $id) {
            return response()->json($product);
        }
    }

    return response()->json(['message' => 'Produk tidak ditemukan'], 404);
});