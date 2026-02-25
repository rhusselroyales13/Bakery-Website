<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\Product;
use App\Models\Sales;
use App\Models\User;

class adminDashboardContent extends Component
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
        $userCount = User::count();
        $salesCount = Sales::count();
        $productCount = Product::count();

        // ── Chart: Sales by Product ────────────────────────────────────────
        $productSales = DB::table('sales')
            ->select(
                'productName',
                DB::raw('SUM(price) as total_sales')
            )
            ->groupBy('productName')
            ->orderByDesc('total_sales')
            ->get();

        $chartLabels = $productSales->pluck('productName')->toArray();
        $chartData   = $productSales->pluck('total_sales')
            ->map(fn($value) => round($value, 2))
            ->toArray();

        $totalSalesOverall = number_format($chartData ? array_sum($chartData) : 0, 2);

        // ── Table: Detailed Products Summary ───────────────────────────────
        $products = DB::table('sales')
            ->select(
                'productName',
                'category',
                DB::raw('COUNT(*) as order_count'),
                DB::raw('SUM(quantity) as total_quantity_sold'),
                DB::raw('SUM(price) as total_sales_value'),
                DB::raw('AVG(price) as avg_price')
            )
            ->groupBy('productName', 'category')
            ->orderByDesc('total_sales_value')
            ->get();

        // Nice formatting for display
        $products = $products->map(function ($item) {
            $item->total_sales_value = number_format($item->total_sales_value, 2);
            $item->avg_price         = number_format($item->avg_price, 2);
            return $item;
        });

        return view('components.admin-dashboard-content', 
        compact('userCount', 'salesCount', 'productCount', 'chartLabels', 'chartData', 'totalSalesOverall', 'products'));
    }
}
