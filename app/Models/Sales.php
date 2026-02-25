<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'name',
        'price',
        'productName',
        'category',
        'quantity',
        'rating',
        'userOrderId'
    ];

     public function user() {
        return $this->belongsTo(User::class, 'id', 'userOrderId');
    }
}
