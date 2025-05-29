<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get total products
        $totalProducts = Product::count();

        // Get total stock and value
        $stockStats = DB::table('products')
            ->selectRaw('SUM(stock) as total_stock, SUM(stock * price) as total_value')
            ->first();

        $totalStock = $stockStats->total_stock ?? 0;
        $totalStockValue = $stockStats->total_value ?? 0;

        // Get low stock products
        $lowStockProducts = Product::where('stock', '<', 10)->get();

        // Get latest products
        $latestProducts = Product::latest()->take(5)->get();

        // Get all products for brand distribution
        $products = Product::all();

        return view('dashboard', compact(
            'totalProducts',
            'totalStock',
            'totalStockValue',
            'lowStockProducts',
            'latestProducts',
            'products'
        ));
    }
}
