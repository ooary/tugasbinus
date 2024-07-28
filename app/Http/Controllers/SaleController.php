<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required',
        ]);
        // dd($request);
            $product = Product::find($request->products);

            $sale = Sale::create([
                'customer_id' => $request->customer_id,
                'total_amount' => $product->sales_price,
            ]);

                if ($product->stock >= $request->qty) {
                    $product->stock -= $request->qty;
                    $product->save();
                } else {
                    return redirect()->back()->withErrors(['message' => 'Insufficient stock for product ' . $product->name]);
                }

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $request->qty,
                    'price' => $product->sales_price,
                ]);
            return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show($id)
    {
        $sale = Sale::with('saleItems.product')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
