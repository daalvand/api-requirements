<?php

namespace App\Http\Requests\Api\V1\Product;

use App\Enums\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function wantsJson(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category'        => 'in:' . implode(',', ProductCategory::values()),
            'price'           => 'int|min:0',
            'price_range'     => 'array',
            'price_range.min' => 'required_with:price_range|int|lte:price_range.max',
            'price_range.max' => 'required_with:price_range|int|gte:price_range.min',
            'page'            => 'int|min:1',
            'per_page'        => 'int|between:1,100'
        ];
    }
}
