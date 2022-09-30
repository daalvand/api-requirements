<?php

namespace App\Http\Controllers;


use App\Http\Requests\Product\IndexRequest;
use App\Http\Resources\ProductCollection;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        return new ProductCollection(
            Product::filter($request->all())->simplePaginate()
        );
    }
}
