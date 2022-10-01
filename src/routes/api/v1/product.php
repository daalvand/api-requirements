<?php


use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class)->only('index');
