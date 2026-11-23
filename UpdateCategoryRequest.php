<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'nama')->ignore($this->route('category')),
            ],
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