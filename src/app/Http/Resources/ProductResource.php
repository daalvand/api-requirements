<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'sku'      => $this->sku,
            "name"     => $this->name,
            "category" => $this->category,
            "price"    => $this->getPrice()
        ];
    }

    private function getPrice(): array
    {
        return [
            "original"            => $this->price,
            "final"               => $this->price - ($this->discount * $this->price),
            "discount_percentage" => $this->discount ? $this->discount * 100 : null,
            "currency"            => $this->currency
        ];
    }
}
