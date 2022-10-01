<?php

namespace App\Http\Controllers;


use App\Http\Requests\Product\IndexRequest;
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
            Product::filter($inputs)->simplePaginate($perPage)
        );
    }
}
