<?php

namespace Database\Factories;

use App\Enums\ProductCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku'      => $this->faker->unique()->numerify("######"),
            'name'     => $this->faker->name(),
            'category' => $this->faker->randomElement(ProductCategory::cases()),
            'price'    => $this->faker->numberBetween(1, 100) * 1000,
        ];
    }
}
