<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

class productCart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cart = Cart::where('userCartId', '=', Auth::id(), 'and')->get();

        return view('components.product-cart', compact('cart'));
    }
}
