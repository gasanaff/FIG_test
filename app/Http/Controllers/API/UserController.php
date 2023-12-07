<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::with('stores.products')->get();
    }

    public function show(int $user)
    {
        return $user->load('stores.products');
    }

}
