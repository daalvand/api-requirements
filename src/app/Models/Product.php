<?php

namespace App\Models;

use App\Enums\ProductCategory;
use App\Models\Traits\HasDiscounts;
use Database\Factories\ProductFactory;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property string $sku
 * @property string $name
 * @property ProductCategory $category
 * @property int $price
 * @property-read string $currency
 * @property-read float|null $discount
 * @method static ProductFactory factory(...$parameters)
 * @method static Builder|Product filter(array $input = [], $filter = null)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Product query()
 * @method static Builder|Product simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Product whereBeginsWith($column, $value, $boolean = 'and')
 * @method static Builder|Product whereCategory($value)
 * @method static Builder|Product whereEndsWith($column, $value, $boolean = 'and')
 * @method static Builder|Product whereLike($column, $value, $boolean = 'and')
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereSku($value)
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory, HasDiscounts, Filterable;

    public $timestamps = false;
    public const CURRENCY = 'EUR';
    protected $primaryKey = 'sku';
    public $incrementing = false;

    protected $casts = [
        'category' => ProductCategory::class,
    ];

    public function getCurrencyAttribute(): string
    {
        return self::CURRENCY;
    }
}
