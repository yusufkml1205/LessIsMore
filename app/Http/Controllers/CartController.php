<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
{
    $cartItems = Auth::user()->cartItems()->with('variant.product')->get();
    $total = $cartItems->sum(function($item) {
        return $item->variant->product->price * $item->quantity;
    });
    
    return view('cart.index', compact('cartItems', 'total'));
}

    public function store(Request $request)
    {
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $existingCartItem = CartItem::where('user_id', Auth::id())
                                   ->where('product_variant_id', $request->product_variant_id)
                                   ->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + $request->quantity
            ]);
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_variant_id' => $request->product_variant_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}