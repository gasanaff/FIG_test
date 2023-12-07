<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductWithUserOnlyCollection;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): ProductCollection|ProductWithUserOnlyCollection
    {

        $column = request()->query('sort') ?? 'created_at';
        $direction = request()->query('order') ?? 'desc';

        $onlyWithUser = request()->query('only_with_user') ?? false;

        if ($onlyWithUser) {
            return new ProductWithUserOnlyCollection(Product::with('store')->orderBy($column, $direction)->paginate(30));
        }

        return new ProductCollection(Product::with('storeUser')->orderBy($column, $direction)->paginate(30));
    }

    public function show(int $store): ProductResource
    {
        return new ProductResource(Product::find($store));
    }

}
