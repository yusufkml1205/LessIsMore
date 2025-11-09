@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header dan Subcategory Navigation -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-4">{{ $subcategory == 'lip_cream' ? 'Lip Cream' : 'Lip Tint' }}</h1>
        
        <!-- Subcategory Navigation -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_tint']) }}" 
               class="px-6 py-3 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-colors {{ $subcategory == 'lip_tint' ? 'bg-black text-white' : '' }}">
                Lip Tint
            </a>
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_cream']) }}" 
               class="px-6 py-3 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-colors {{ $subcategory == 'lip_cream' ? 'bg-black text-white' : '' }}">
                Lip Cream
            </a>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-gray-200">
            @if($product->variants->first())
            <div class="relative">
                @php
                    // Fix path untuk Vercel - hapus 'storage/' dari awal path
                    $imageUrl = $product->variants->first()->image_url;
                    if (str_starts_with($imageUrl, 'storage/')) {
                        $imageUrl = substr($imageUrl, 8); // Hapus 'storage/' (8 karakter)
                    }
                @endphp
                <img src="{{ asset($imageUrl) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-64 object-cover cursor-pointer"
                     onclick="window.location='{{ route('products.show', $product) }}'"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <!-- Fallback jika gambar tidak load -->
                <div class="absolute inset-0 bg-gray-100 flex items-center justify-center hidden" 
                     style="display: none;">
                    <div class="text-center text-gray-400">
                        <i class="fas fa-image text-3xl mb-2"></i>
                        <p class="text-sm">Gambar tidak tersedia</p>
                    </div>
                </div>
            </div>
            @else
            <!-- Placeholder jika tidak ada variant -->
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <div class="text-center text-gray-400">
                    <i class="fas fa-image text-3xl mb-2"></i>
                    <p class="text-sm">Tidak ada gambar</p>
                </div>
            </div>
            @endif
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2 line-clamp-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ $product->brand }}</p>
                <p class="text-xl font-bold text-black mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <a href="{{ route('products.show', $product) }}" 
                   class="block w-full bg-black text-white text-center py-2 rounded-lg hover:bg-gray-800 transition-colors">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>

    @if($products->isEmpty())
    <div class="text-center py-12">
        <i class="fas fa-box-open text-4xl text-gray-400 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-600">Tidak ada produk ditemukan</h3>
        <p class="text-gray-500">Silakan pilih kategori lain.</p>
    </div>
    @endif
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection