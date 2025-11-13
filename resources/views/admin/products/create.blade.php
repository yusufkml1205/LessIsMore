@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Tambah Produk Baru</h1>
    <p class="text-gray-600 mt-2">Isi form untuk menambahkan produk baru</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf
        
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Informasi Produk</h2>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                </div>
                
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand *</label>
                    <input type="text" id="brand" name="brand" value="{{ old('brand') }}" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select id="category" name="category" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                        <option value="">Pilih Kategori</option>
                        <option value="lip" {{ old('category') == 'lip' ? 'selected' : '' }}>Lip</option>
                    </select>
                </div>
                
                <div>
                    <label for="subcategory" class="block text-sm font-medium text-gray-700 mb-2">Subkategori *</label>
                    <select id="subcategory" name="subcategory" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                        <option value="">Pilih Subkategori</option>
                        <option value="lip_tint" {{ old('subcategory') == 'lip_tint' ? 'selected' : '' }}>Lip Tint</option>
                        <option value="lip_cream" {{ old('subcategory') == 'lip_cream' ? 'selected' : '' }}>Lip Cream</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga *</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" step="1"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>{{ old('description') }}</textarea>
            </div>

            <!-- Variants Section -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Varian Produk</h3>
                    <button type="button" id="addVariant" 
                            class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Tambah Varian
                    </button>
                </div>
                
                <div id="variantsContainer" class="space-y-4">
                    <!-- Variant template akan ditambahkan di sini -->
                </div>
            </div>
        </div>
        
        <div class="p-6 border-t border-gray-200 bg-gray-50">
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.products') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-black text-white rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                    Simpan Produk
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Variant Template -->
<template id="variantTemplate">
    <div class="variant-item border border-gray-200 rounded-lg p-4 bg-white">
        <div class="flex justify-between items-start mb-4">
            <h4 class="font-medium text-gray-900">Varian <span class="variant-number">1</span></h4>
            <button type="button" class="remove-variant text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Shade *</label>
                <input type="text" name="variants[0][shade_name]" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-black focus:ring-1 focus:ring-black" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar *</label>
                <input type="file" name="variants[0][image]" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-black focus:ring-1 focus:ring-black" required>
            </div>
        </div>
    </div>
</template>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let variantCount = 0;
    const variantsContainer = document.getElementById('variantsContainer');
    const variantTemplate = document.getElementById('variantTemplate');
    const addVariantBtn = document.getElementById('addVariant');

    // Add first variant by default
    addVariant();

    function addVariant() {
        const variantElement = variantTemplate.content.cloneNode(true);
        const variantItem = variantElement.querySelector('.variant-item');
        
        // Update variant number
        variantCount++;
        variantItem.querySelector('.variant-number').textContent = variantCount;
        
        // Update input names
        const shadeInput = variantItem.querySelector('input[type="text"]');
        const imageInput = variantItem.querySelector('input[type="file"]');
        
        shadeInput.name = `variants[${variantCount}][shade_name]`;
        imageInput.name = `variants[${variantCount}][image]`;
        
        // Add remove functionality
        const removeBtn = variantItem.querySelector('.remove-variant');
        removeBtn.addEventListener('click', function() {
            if (document.querySelectorAll('.variant-item').length > 1) {
                variantItem.remove();
                updateVariantNumbers();
            } else {
                alert('Produk harus memiliki minimal 1 varian!');
            }
        });
        
        variantsContainer.appendChild(variantElement);
    }

    function updateVariantNumbers() {
        const variantItems = document.querySelectorAll('.variant-item');
        variantItems.forEach((item, index) => {
            item.querySelector('.variant-number').textContent = index + 1;
        });
    }

    addVariantBtn.addEventListener('click', addVariant);
});
</script>
@endpush
@endsection