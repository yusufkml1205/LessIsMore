@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Manajemen Produk</h1>
    <p class="text-gray-600 mt-2">Kelola produk dan varian yang tersedia</p>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
    <div class="flex items-center">
        <i class="fas fa-check-circle text-green-500 mr-3"></i>
        <span class="text-green-800">{{ session('success') }}</span>
    </div>
</div>
@endif

@if(session('error'))
<div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
    <div class="flex items-center">
        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
        <span class="text-red-800">{{ session('error') }}</span>
    </div>
</div>
@endif

<!-- Header dengan Tombol Tambah -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-semibold text-gray-900">Daftar Produk</h2>
        <p class="text-gray-600">Total: {{ $products->count() }} produk</p>
    </div>
    <a href="{{ route('admin.products.create') }}" 
       class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
        <i class="fas fa-plus mr-2"></i>Tambah Produk
    </a>
</div>

<!-- Products Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Varian</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($products as $product)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($product->variants->first())
                            <img src="{{ asset($product->variants->first()->image_url) }}" 
                                 alt="{{ $product->name }}"
                                 class="w-12 h-12 object-cover rounded-lg mr-4"
                                 onerror="this.style.display='none'">
                            @endif
                            <div>
                                <div class="font-medium text-gray-900">{{ $product->name }}</div>
                                <div class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($product->description, 50) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 capitalize">
                            {{ str_replace('_', ' ', $product->subcategory) }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $product->brand }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-900">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $product->variants->count() }} shade
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition-colors">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-md transition-colors">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($products->isEmpty())
    <div class="text-center py-12">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-box-open text-gray-400 text-xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum ada produk</h3>
        <p class="text-gray-500 mb-6">Mulai dengan menambahkan produk pertama Anda.</p>
        <a href="{{ route('admin.products.create') }}" 
           class="inline-flex items-center px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors">
            <i class="fas fa-plus mr-2"></i>Tambah Produk Pertama
        </a>
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