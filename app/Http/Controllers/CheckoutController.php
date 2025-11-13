<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
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

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }

        if ($user->balance < $total) {
            return redirect()->route('cart.index')->with('error', 'Saldo tidak mencukupi');
        }

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $total,
            'status' => 'completed',
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->variant->product->id,
                'product_variant_id' => $cartItem->product_variant_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->variant->product->price,
            ]);
        }

        // Deduct balance
        $user->balance -= $total;
        $user->save();

        // Clear cart
        $user->cartItems()->delete();

        return view('checkout.success', compact('total', 'order'));
    }
}