<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Minuman'],
            ['nama' => 'Makanan'],
            ['nama' => 'Elektronik'],
            ['nama' => 'Pakaian'],
            ['nama' => 'Peralatan Rumah'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}