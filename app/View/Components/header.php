<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

class header extends Component
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
        if (Auth::id()) {
            $count = Cart::where('userCartId', '=', Auth::id(), 'and')->count();
        } else {
            $count = '';
        }

        return view('components.header', compact('count'));
    }
}
