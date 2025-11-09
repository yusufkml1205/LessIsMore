<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
{
    $cartItems = Auth::user()->cartItems()->with('variant.product')->get();
    $total = $cartItems->sum(function($item) {
        return $item->variant->product->price * $item->quantity;
    });
    
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
    }

    if (Auth::user()->balance < $total) {
        return redirect()->route('cart.index')->with('error', 'Saldo tidak mencukupi');
    }

    return view('checkout.index', compact('cartItems', 'total'));
}

public function process(Request $request)
{
    $user = Auth::user();
    $cartItems = $user->cartItems()->with('variant.product')->get();
    $total = $cartItems->sum(function($item) {
        return $item->variant->product->price * $item->quantity;
    });

    if ($user->balance < $total) {
        return redirect()->route('cart.index')->with('error', 'Saldo tidak mencukupi');
    }

    // Deduct balance
    $user->balance -= $total;
    $user->save();

    // Clear cart
    $user->cartItems()->delete();

    return view('checkout.success', compact('total'));
}
}