<?php

namespace App\Application\Http\Controllers\Api\V1;


use App\Application\Http\Controllers\Controller;
use App\Application\Http\Requests\Api\V1\Product\IndexRequest;
use App\Application\Http\Resources\ProductResource;
use App\Domain\Product\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(IndexRequest $request): AnonymousResourceCollection
    {
        $inputs = $request->validated();
        $perPage = $inputs['per_page'] ?? 10;
        return ProductResource::collection(
            Product::filter($inputs)->simplePaginate($perPage)->appends($inputs)
        );
    }
}
