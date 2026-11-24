<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Aksesoris Komputer',
            'Peralatan Kantor',
            'Perlengkapan Rumah',
            'Buku & Alat Tulis',
            'Penyimpanan & Jaringan',
        ];

        foreach ($categories as $nama) {
            Category::firstOrCreate(['nama' => $nama]);
        }
    }
}