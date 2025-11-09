@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-8">Keranjang Belanja</h1>
    
    @if($cartItems->count() > 0)
    <!-- Desktop View -->
    <div class="hidden md:block">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Shade</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Harga</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Jumlah</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Subtotal</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($cartItems as $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset($item->variant->image_url) }}" 
                                     alt="{{ $item->variant->shade_name }}" 
                                     class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">{{ $item->variant->product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $item->variant->product->brand }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $item->variant->shade_name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            Rp {{ number_format($item->variant->product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="number" 
                                       name="quantity" 
                                       value="{{ $item->quantity }}" 
                                       min="1" 
                                       class="w-20 border border-gray-300 rounded-lg px-3 py-1 text-center focus:border-black focus:ring-1 focus:ring-black"
                                       onchange="this.form.submit()">
                            </form>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            Rp {{ number_format($item->total_price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('cart.destroy', $item) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 transition-colors"
                                        onclick="return confirm('Hapus produk dari keranjang?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50 border-t border-gray-200">
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-right text-sm font-medium text-gray-700">
                            Total:
                        </td>
                        <td colspan="2" class="px-6 py-4 text-sm font-bold text-gray-900">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Mobile View -->
    <div class="block md:hidden space-y-4">
        @foreach($cartItems as $item)
        <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200">
            <div class="flex space-x-4">
                <img src="{{ asset($item->variant->image_url) }}" 
                     alt="{{ $item->variant->shade_name }}" 
                     class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                <div class="flex-1">
                    <h3 class="text-sm font-medium text-gray-900 mb-1">{{ $item->variant->product->name }}</h3>
                    <p class="text-xs text-gray-500 mb-2">{{ $item->variant->product->brand }}</p>
                    
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $item->variant->shade_name }}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <div>
                            <span class="text-gray-600">Harga:</span>
                            <p class="font-medium">Rp {{ number_format($item->variant->product->price, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <span class="text-gray-600">Subtotal:</span>
                            <p class="font-semibold">Rp {{ number_format($item->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-3">
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <span class="text-sm text-gray-600">Qty:</span>
                            <input type="number" 
                                   name="quantity" 
                                   value="{{ $item->quantity }}" 
                                   min="1" 
                                   class="w-16 border border-gray-300 rounded-lg px-2 py-1 text-center focus:border-black focus:ring-1 focus:ring-black"
                                   onchange="this.form.submit()">
                        </form>
                        
                        <form action="{{ route('cart.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 transition-colors"
                                    onclick="return confirm('Hapus produk dari keranjang?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Total for Mobile -->
        <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200">
            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-900">Total:</span>
                <span class="text-lg font-bold text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 mt-8">
        <a href="{{ route('products.index') }}" 
           class="w-full sm:w-auto px-6 py-3 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-colors text-center">
            Lanjut Belanja
        </a>
        <a href="{{ route('checkout.index') }}" 
           class="w-full sm:w-auto px-8 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors text-center">
            Checkout Sekarang
        </a>
    </div>
    @else
    <!-- Empty Cart -->
    <div class="text-center py-16">
        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-shopping-cart text-3xl text-gray-400"></i>
        </div>
        <h3 class="text-2xl font-semibold text-gray-600 mb-4">Keranjang belanja kosong</h3>
        <p class="text-gray-500 mb-8 max-w-md mx-auto">
            Silakan tambahkan produk favorit Anda ke keranjang belanja untuk melanjutkan pembelian.
        </p>
        <a href="{{ route('products.index') }}" 
           class="inline-flex items-center px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors">
            <i class="fas fa-shopping-bag mr-2"></i>
            Mulai Belanja
        </a>
    </div>
    @endif
</div>
@endsection