<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'        => ['sometimes', 'required', 'string', 'max:255'],
            'harga'       => ['sometimes', 'required', 'numeric', 'min:0'],
            'stok'        => ['sometimes', 'required', 'integer', 'min:0'],
            'description' => ['sometimes', 'nullable', 'string'],
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
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