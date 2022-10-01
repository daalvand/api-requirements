<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Product\IndexRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
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
