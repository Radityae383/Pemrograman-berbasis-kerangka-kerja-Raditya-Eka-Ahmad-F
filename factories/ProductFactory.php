<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->words(2, true),
            'deskripsi' => fake()->sentence(),
            'harga' => fake()->numberBetween(5, 200) * 1000,
            'stok' => fake()->numberBetween(0, 100),
        ];
    }
}