<?php

namespace App\Models\Traits;

use App\Enums\ProductCategory;

trait HasDiscounts
{
    public function getDiscountAttribute(): ?float
    {
        if ($this->category === ProductCategory::INSURANCE) {
            return 0.30;
        }
        if ($this->sku === '000003') {
            return 0.15;
        }
        return 0;
    }
}
