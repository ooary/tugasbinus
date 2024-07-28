<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total revenue
        $totalRevenue = Sale::sum('total_amount');

        // Calculate total costs (sum of all products' prices * quantity sold)
        $totalCosts = 0;
        $sales = Sale::with('saleItems')->get();
        foreach ($sales as $sale) {
            foreach ($sale->saleItems as $item) {
                $totalCosts += $item->product->price * $item->quantity;
            }
        }

        // Calculate net profit
        $netProfit = $totalRevenue - $totalCosts;

        return view('dashboard.index', compact('totalRevenue', 'totalCosts', 'netProfit'));
    }
}
