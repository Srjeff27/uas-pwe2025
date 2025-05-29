<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total products
        $totalProducts = Product::count();
        
        // Get total stock value
        $totalStockValue = Product::sum(DB::raw('stock * price'));
        
        // Get low stock products (less than 10 items)
        $lowStockProducts = Product::where('stock', '<', 10)->get();
        
        // Get products by category
        $productsByCategory = Product::select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();
        
        // Get latest products
        $latestProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalStockValue',
            'lowStockProducts',
            'productsByCategory',
            'latestProducts'
        ));
    }
} 