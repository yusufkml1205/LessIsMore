@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Order Summary & Customer Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-4">
                    @foreach($cartItems as $item)
                    <div class="flex justify-between items-start py-3 border-b border-gray-100">
                        <div class="flex space-x-3">
                            <img src="{{ asset($item->variant->image_url) }}" 
                                 alt="{{ $item->variant->shade_name }}" 
                                 class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">{{ $item->variant->product->name }}</h3>
                                <p class="text-xs text-gray-500">{{ $item->variant->product->brand }}</p>
                                <p class="text-xs text-gray-600 mt-1">
                                    Shade: <span class="font-medium">{{ $item->variant->shade_name }}</span>
                                </p>
                                <p class="text-xs text-gray-600">
                                    Qty: <span class="font-medium">{{ $item->quantity }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">
                                Rp {{ number_format($item->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Total -->
                <div class="flex justify-between items-center pt-4 mt-4 border-t border-gray-200">
                    <span class="text-lg font-semibold text-gray-900">Total Pembayaran:</span>
                    <span class="text-xl font-bold text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4">Informasi Pembeli</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
                            <p class="mt-1 text-sm text-gray-900">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Usia</label>
                            <p class="mt-1 text-sm text-gray-900">{{ auth()->user()->age }} tahun</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if(auth()->user()->gender == 'male')
                                    Laki-laki
                                @elseif(auth()->user()->gender == 'female')
                                    Perempuan
                                @else
                                    Lainnya
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Payment -->
        <div class="space-y-6">
            <!-- QRIS Payment -->
            <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4 text-center">Pembayaran</h2>
                <!-- Payment Details -->
                <div class="space-y-3 bg-gray-50 rounded-lg p-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Biaya Admin:</span>
                        <span class="text-gray-900">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-lg font-semibold border-t border-gray-200 pt-2">
                        <span class="text-gray-900">Total:</span>
                        <span class="text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Confirmation -->
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full bg-black text-white py-4 rounded-lg font-semibold hover:bg-gray-800 transition-colors flex items-center justify-center space-x-2"
                        onclick="return confirm('Konfirmasi pembayaran? Saldo akan dikurangi Rp {{ number_format($total, 0, ',', '.') }}')">
                    <i class="fas fa-lock"></i>
                    <span>Konfirmasi Pembayaran</span>
                </button>
            </form>

            <!-- Back to Cart -->
            <a href="{{ route('cart.index') }}" 
               class="block w-full text-center px-6 py-3 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-colors">
                Kembali ke Keranjang
            </a>
        </div>
    </div>
</div>
@endsection