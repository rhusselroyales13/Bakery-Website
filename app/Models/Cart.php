<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    public function user() {
        return $this->hasOne( User::class, 'id', 'userCartId');
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'productCartId');
    }
}
