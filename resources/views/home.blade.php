@extends('layouts.app')

@section('content')
<!-- Hero Section dengan Gradient -->
<div class="relative bg-gradient-to-br from-gray-900 to-black text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-300">
                    Less Is More
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Temukan keindahan dalam kesederhanaan. Koleksi lip produk premium untuk penampilan yang sempurna.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_tint']) }}" 
                   class="group relative px-8 py-4 bg-white text-black font-semibold rounded-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    <span class="relative z-10">Explore Lip Tints</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_cream']) }}" 
                   class="group relative px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-black transition-all duration-300 transform hover:scale-105">
                    <span class="relative z-10">Discover Lip Creams</span>
                </a>
            </div>
        </div>
        
        <!-- Hero Image -->
        <div class="max-w-4xl mx-auto mt-12">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500">
                <img src="{{ asset('images/hero/hero.jpg') }}"
     alt="Less Is More - Premium Lip Products" 
     class="w-full h-64 md:h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </div>
</div>

<!-- Featured Categories Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Our Collections
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Pilih dari berbagai koleksi lip produk berkualitas tinggi dengan formula terbaik
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Lip Tint Card -->
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_tint']) }}" 
               class="group relative bg-gradient-to-br from-pink-50 to-rose-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-pink-200 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform duration-300">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Lip Tint</h3>
                    <p class="text-gray-600 mb-4">
                        Warna alami yang tahan lama dengan finish natural untuk tampilan segar sepanjang hari
                    </p>
                    <div class="flex items-center text-pink-600 font-semibold">
                        <span>Explore Collection</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>

            <!-- Lip Cream Card -->
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_cream']) }}" 
               class="group relative bg-gradient-to-br from-purple-50 to-indigo-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-200 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform duration-300">
                        <i class="fas fa-palette text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Lip Cream</h3>
                    <p class="text-gray-600 mb-4">
                        Tekstur creamy yang mewah dengan pigmentasi tinggi untuk penampilan yang bold dan elegant
                    </p>
                    <div class="flex items-center text-purple-600 font-semibold">
                        <span>Discover Products</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Featured Products Preview -->
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Featured Products
            </h2>
            <p class="text-lg text-gray-600">
                Produk terbaik dari koleksi kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $featuredProducts = \App\Models\Product::with('variants')->inRandomOrder()->take(3)->get();
            @endphp
            
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] group overflow-hidden border border-gray-100">
                @if($product->variants->first())
                <div class="relative overflow-hidden">
                    @if($product->variants->first())
<img src="{{ asset(str_replace('storage/', '', $product->variants->first()->image_url)) }}" 
     alt="{{ $product->name }}" 
     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
     onerror="this.src='https://via.placeholder.com/300x300?text=Image+Not+Found'">
@endif
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-600 rounded-full">
                            {{ $product->brand }}
                        </span>
                        <span class="text-lg font-bold text-gray-900">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        {{ $product->name }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $product->description ?? 'Produk berkualitas premium dengan hasil terbaik.' }}
                    </p>
                    <a href="{{ route('products.show', $product) }}" 
                       class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors flex items-center justify-center space-x-2 group/btn">
                        <span>View Details</span>
                        <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Products Button -->
        <div class="text-center mt-12">
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_tint']) }}" 
               class="inline-flex items-center px-8 py-4 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition-all duration-300 transform hover:scale-105">
                <span>View All Products</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<!-- Brand Values Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-gem text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Premium Quality</h3>
                <p class="text-gray-600">
                    Produk dengan bahan terbaik dan formula terkini untuk hasil yang maksimal
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Skin Friendly</h3>
                <p class="text-gray-600">
                    Formulasi yang aman dan nyaman untuk semua jenis kulit, termasuk sensitif
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fast Delivery</h3>
                <p class="text-gray-600">
                    Pengiriman cepat dan aman ke seluruh Indonesia dengan packaging terbaik
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Stay Updated
        </h2>
        <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto">
            Dapatkan informasi terbaru tentang produk dan promo eksklusif dari Less Is More
        </p>
        <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
            <input type="email" 
                   placeholder="Enter your email" 
                   class="flex-1 px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent">
            <button class="px-6 py-3 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                Subscribe
            </button>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for hero section
    const scrollIndicator = document.querySelector('.animate-bounce');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            window.scrollTo({
                top: document.getElementById('featured-categories').offsetTop,
                behavior: 'smooth'
            });
        });
    }

    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.grid > div').forEach(el => {
        observer.observe(el);
    });
});
</script>
@endsection