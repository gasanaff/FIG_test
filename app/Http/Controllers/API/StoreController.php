<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    public function index(): StoreCollection
    {

        $column = request()->query('sort') ?? 'created_at';
        $direction = request()->query('order') ?? 'desc';

        return new StoreCollection(Store::with('user')->orderBy($column, $direction)->paginate(30));
    }


    public function show(int $store): StoreResource
    {
        return new StoreResource(Store::find($store));
    }

}
