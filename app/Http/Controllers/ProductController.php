<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'lip');
        $subcategory = $request->get('subcategory', 'lip_tint');
        
        $products = Product::where('category', $category)
                          ->where('subcategory', $subcategory)
                          ->with('variants')
                          ->get();

        return view('products.index', compact('products', 'category', 'subcategory'));
    }

    public function show(Product $product)
    {
        $product->load('variants');
        return view('products.show', compact('product'));
    }
}