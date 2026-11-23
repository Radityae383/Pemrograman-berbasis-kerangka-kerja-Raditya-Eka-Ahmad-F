<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search berdasarkan nama produk
        if ($request->filled('search')) {
            $search = $request->string('search')->value();
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter berdasarkan category_id
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->integer('category_id'));
        }

        // Filter stok tersedia (stok > 0)
        if ($request->boolean('tersedia')) {
            $query->where('stok', '>', 0);
        }

        // Sorting (whitelist kolom agar aman)
        $allowedSortBy = ['id', 'name', 'harga', 'stok', 'created_at'];
        $sortBy = in_array($request->get('sort_by'), $allowedSortBy, true)
            ? $request->get('sort_by')
            : 'id';
        $sortDir = strtolower((string) $request->get('sort_dir', 'asc')) === 'desc' ? 'desc' : 'asc';

        $query->orderBy($sortBy, $sortDir);

        // Pagination
        $perPage = min(max($request->integer('per_page', 10), 1), 100);

        return ProductResource::collection($query->paginate($perPage));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'harga'       => ['required', 'numeric', 'min:0'],
            'stok'        => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $product = Product::create($validated)->load('category');

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Product $product)
    {
        $product->load('category');

        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => ['sometimes', 'required', 'string', 'max:255'],
            'harga'       => ['sometimes', 'required', 'numeric', 'min:0'],
            'stok'        => ['sometimes', 'required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
        ]);

        $product->update($validated);
        $product->load('category');

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }

    public function summary()
    {
        return response()->json([
            'data' => [
                'total_produk'    => Product::count(),
                'total_stok'      => (int) Product::sum('stok'),
                'rata_rata_harga' => round((float) Product::avg('harga'), 2),
            ],
        ]);
    }
}