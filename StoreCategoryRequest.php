<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255', 'unique:categories,nama'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.string'   => 'Nama kategori harus berupa teks.',
            'nama.max'      => 'Nama kategori maksimal 255 karakter.',
            'nama.unique'   => 'Nama kategori sudah dipakai.',
        ];
    }
}