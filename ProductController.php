<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private array $products = [
        ['id' => 1, 'nama' => 'Kopi Arabika', 'harga' => 45000, 'stok' => 10],
        ['id' => 2, 'nama' => 'Teh Hijau', 'harga' => 25000, 'stok' => 15],
    ];

    public function index()
    {
        return response()->json($this->products);
    }

    public function store(Request $request)
    {
        $nama  = $request->input('nama');
        $harga = $request->harga;
        $stok  = $request->input('stok');

        return response()->json([
            'pesan' => 'Produk diterima',
            'data'  => [
                'nama'  => $nama,
                'harga' => $harga,
                'stok'  => $stok,
            ],
        ], 201);
    }

    public function show($id)
    {
        foreach ($this->products as $product) {
            if ((int) $product['id'] === (int) $id) {
                return response()->json($product);
            }
        }

        return response()->json([
            'pesan' => 'Produk tidak ditemukan',
        ], 404);
    }
}