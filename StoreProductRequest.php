<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'        => ['required', 'string', 'max:255'],
            'harga'       => ['required', 'numeric', 'min:0'],
            'stok'        => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'        => 'Nama produk wajib diisi.',
            'nama.string'          => 'Nama produk harus berupa teks.',
            'nama.max'             => 'Nama produk maksimal 255 karakter.',
            'harga.required'       => 'Harga produk wajib diisi.',
            'harga.numeric'        => 'Harga harus berupa angka.',
            'harga.min'            => 'Harga tidak boleh negatif.',
            'stok.required'        => 'Stok produk wajib diisi.',
            'stok.integer'         => 'Stok harus berupa angka bulat.',
            'stok.min'             => 'Stok tidak boleh negatif.',
            'description.string'   => 'Deskripsi harus berupa teks.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori tidak ditemukan.',
        ];
    }
}