<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;

class myOrder extends Component
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
        $userId = Auth::user()->id;
        $order = Order::with('product.ratings')->where('userOrderId', '=', $userId, 'and')->get();

        return view('components.my-order', compact('order'));
    }
}
