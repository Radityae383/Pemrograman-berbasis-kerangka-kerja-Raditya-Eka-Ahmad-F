<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        return response()->json([
            'pesan' => 'Produk diterima',
            'data' => [
                'nama' => $nama,
                'harga' => $harga,
                'stok' => $stok,
            ],
        ], 201);
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (! $product) {
            return response()->json([
                'pesan' => 'Produk tidak ditemukan',
            ], 404);
        }

        return response()->json($product);
    }
}