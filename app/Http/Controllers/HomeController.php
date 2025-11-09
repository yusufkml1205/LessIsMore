<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products for the home page
        $featuredProducts = Product::with('variants')
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('home', compact('featuredProducts'));
    }
}