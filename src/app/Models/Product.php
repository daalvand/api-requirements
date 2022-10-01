<?php

namespace App\Models;

use App\Enums\ProductCategory;
use App\Models\Traits\HasDiscounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasDiscounts;

    public $timestamps = false;
    public const CURRENCY = 'EUR';
    protected $primaryKey = 'sku';

    protected $casts = [
        'category' => ProductCategory::class,
    ];

    public function getCurrencyAttribute(): string
    {
        return self::CURRENCY;
    }
}
