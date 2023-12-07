<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function storeUser()
    {
        return $this->hasOneThrough(User::class, Store::class, 'id', 'id', 'store_id', 'user_id');
    }
}
