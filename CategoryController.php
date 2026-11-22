<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'nama' => 'Kopi'],
            ['id' => 2, 'nama' => 'Teh'],
            ['id' => 3, 'nama' => 'Snack'],
        ]);
    }
}