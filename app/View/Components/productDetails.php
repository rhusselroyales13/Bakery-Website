<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


use App\Models\Product;

class productDetails extends Component
{
    

    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = Product::all();

        return view('components.product-details', compact('product'));
    }
}
