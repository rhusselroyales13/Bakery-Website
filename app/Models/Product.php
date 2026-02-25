<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'category',
        'stock',
        'rating'
    ];

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
    public function averageRating() {
        return $this->ratings()->avg('rating');
    }
}
