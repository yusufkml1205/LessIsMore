@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Images -->
        <div>
            <div id="productCarousel" class="relative rounded-lg overflow-hidden shadow-lg">
                <div class="carousel-inner">
                    @foreach($product->variants as $key => $variant)
                    @php
                        // Fix path untuk Vercel
                        $imageUrl = $variant->image_url;
                        if (str_starts_with($imageUrl, 'storage/')) {
                            $imageUrl = substr($imageUrl, 8);
                        }
                    @endphp
                    <div class="carousel-item {{ $key == 0 ? 'block' : 'hidden' }}">
                        <img src="{{ asset($imageUrl) }}" 
                             class="w-full h-96 object-cover rounded-lg" 
                             alt="{{ $variant->shade_name }}"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <!-- Fallback image -->
                        <div class="w-full h-96 bg-gray-100 flex items-center justify-center hidden rounded-lg">
                            <div class="text-center text-gray-400">
                                <i class="fas fa-image text-3xl mb-2"></i>
                                <p class="text-sm">Gambar tidak tersedia</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Carousel Controls -->
                @if($product->variants->count() > 1)
                <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-70 transition-all" 
                        onclick="prevSlide()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-70 transition-all" 
                        onclick="nextSlide()">
                    <i class="fas fa-chevron-right"></i>
                </button>
                @endif
            </div>

            <!-- Thumbnail Images -->
            @if($product->variants->count() > 1)
            <div class="grid grid-cols-5 gap-2 mt-4">
                @foreach($product->variants as $key => $variant)
                @php
                    // Fix path untuk Vercel
                    $thumbUrl = $variant->image_url;
                    if (str_starts_with($thumbUrl, 'storage/')) {
                        $thumbUrl = substr($thumbUrl, 8);
                    }
                @endphp
                <img src="{{ asset($thumbUrl) }}" 
                     class="w-full h-16 object-cover rounded border-2 cursor-pointer carousel-thumbnail {{ $key == 0 ? 'border-black' : 'border-gray-300' }}" 
                     alt="{{ $variant->shade_name }}"
                     onclick="showSlide({{ $key }})"
                     onerror="this.style.display='none';">
                @endforeach
            </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="space-y-6">
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-gray-600 text-lg">{{ $product->brand }}</p>
                <p class="text-2xl font-bold text-black mt-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>

            <form action="{{ route('cart.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <!-- Shade Selection -->
                <div>
                    <label for="variant" class="block text-sm font-medium text-gray-700 mb-2">Pilih Shade:</label>
                    <select id="variant" name="product_variant_id" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                        <option value="">Pilih shade</option>
                        @foreach($product->variants as $variant)
                        @php
                            // Fix path untuk data attribute
                            $variantImageUrl = $variant->image_url;
                            if (str_starts_with($variantImageUrl, 'storage/')) {
                                $variantImageUrl = substr($variantImageUrl, 8);
                            }
                        @endphp
                        <option value="{{ $variant->id }}" data-image="{{ asset($variantImageUrl) }}">
                            {{ $variant->shade_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Jumlah:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:ring-1 focus:ring-black" required>
                </div>
                
                <!-- Add to Cart Button -->
                <button type="submit" 
                        class="w-full bg-black text-white py-4 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                    Add to Cart
                </button>
            </form>

            <!-- Product Description -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold mb-3">Deskripsi Produk</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ $product->description ?? 'Tidak ada deskripsi tersedia.' }}
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlide(index) {
    // Hide all slides
    slides.forEach(slide => {
        slide.classList.add('hidden');
        slide.classList.remove('block');
    });
    
    // Show selected slide
    if (slides[index]) {
        slides[index].classList.remove('hidden');
        slides[index].classList.add('block');
        currentSlide = index;
    }
    
    // Update thumbnail borders
    document.querySelectorAll('.carousel-thumbnail').forEach((thumb, i) => {
        if (thumb.style.display !== 'none') {
            thumb.classList.toggle('border-black', i === index);
            thumb.classList.toggle('border-gray-300', i !== index);
        }
    });
}

function nextSlide() {
    if (totalSlides > 1) {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
}

function prevSlide() {
    if (totalSlides > 1) {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
}

// Auto slide every 5 seconds jika ada lebih dari 1 gambar
if (totalSlides > 1) {
    setInterval(nextSlide, 5000);
}

// Update carousel when variant select changes
document.getElementById('variant').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const imageUrl = selectedOption.getAttribute('data-image');
    if (imageUrl) {
        // Find and show the slide with matching image
        slides.forEach((slide, index) => {
            const img = slide.querySelector('img');
            if (img && img.src === imageUrl) {
                showSlide(index);
            }
        });
    }
});

// Initialize thumbnail borders
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.carousel-thumbnail').forEach((thumb, index) => {
        if (thumb.style.display !== 'none') {
            thumb.classList.toggle('border-black', index === 0);
            thumb.classList.toggle('border-gray-300', index !== 0);
        }
    });
});

// Handle image loading errors
document.querySelectorAll('img').forEach(img => {
    img.addEventListener('error', function() {
        this.style.display = 'none';
        const fallback = this.nextElementSibling;
        if (fallback && fallback.classList.contains('hidden')) {
            fallback.style.display = 'flex';
        }
    });
});
</script>

<style>
.carousel-item {
    transition: opacity 0.5s ease-in-out;
}

.hidden {
    display: none;
}

.block {
    display: block;
}
</style>
@endpush
@endsection