<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    public function user() {
        return $this->hasOne( User::class, 'id', 'userOrderId');
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'productOrderId');
    }

    
}
