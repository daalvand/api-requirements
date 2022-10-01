<?php

namespace App\Domain\Product\ModelFilters;

use App\Domain\Product\Models\Product;
use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    protected $model = Product::class;

    public function category(string $value): void
    {
        $this->where('category', $value);
    }

    public function priceRange(array $range): void
    {
        $this->whereBetween('price', [$range['min'], $range['max']]);
    }

    public function price(int $value): void
    {
        $this->where('price', $value);
    }
}
