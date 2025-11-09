@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center">
        <!-- Success Icon -->
        <div class="mx-auto w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <i class="fas fa-check-circle text-4xl text-green-600"></i>
        </div>

        <!-- Success Message -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Pembayaran Berhasil!</h1>
        <p class="text-lg text-gray-600 mb-6 max-w-md mx-auto">
            Terima kasih telah berbelanja di <span class="font-semibold">Less Is More</span>. 
            Pesanan Anda sedang diproses.
        </p>

        <!-- Payment Details -->
        <div class="bg-gray-50 rounded-lg p-6 mb-8 max-w-sm mx-auto">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">Total Pembayaran:</span>
                <span class="text-xl font-bold text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-500">Metode Pembayaran:</span>
                <span class="text-gray-700 font-medium">QRIS</span>
            </div>
        </div>

        <!-- Saldo Info -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8 max-w-sm mx-auto">
            <div class="flex items-center justify-center space-x-2">
                <i class="fas fa-wallet text-blue-600"></i>
                <span class="text-sm text-blue-800">
                    Sisa saldo Anda: <strong>Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}</strong>
                </span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                <i class="fas fa-home mr-2"></i>
                Kembali ke Beranda
            </a>
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center px-6 py-3 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-colors">
                <i class="fas fa-shopping-bag mr-2"></i>
                Lanjut Belanja
            </a>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">
                Pesanan akan diproses dalam 1x24 jam.<br>
                Terima kasih atas kepercayaan Anda!
            </p>
        </div>
    </div>
</div>
@endsection