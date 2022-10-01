<?php

namespace App\Domain\Product\Database\Factories;

use App\Domain\Product\Enums\ProductCategory;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku'      => $this->faker->unique()->numerify("######"),
            'name'     => $this->faker->name(),
            'category' => $this->faker->randomElement(ProductCategory::cases()),
            'price'    => $this->faker->numberBetween(1, 100) * 1000,
        ];
    }
}
