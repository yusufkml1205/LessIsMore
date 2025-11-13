<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Less Is More</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: -250px;
            transition: left 0.3s ease;
            background-color: white;
            border-right: 1px solid #e5e7eb;
            z-index: 1000;
        }
        .sidebar.show {
            left: 0;
        }
        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }
        .main-content.sidebar-open {
            margin-left: 250px;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .overlay.show {
            display: block;
        }
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
        }
    </style>
</head>
<body class="bg-white text-black">
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-4 border-b border-gray-200">
            <h5 class="font-semibold text-lg">Kategori Produk</h5>
        </div>
        <div class="py-2">
            <a href="{{ route('products.index', ['category' => 'lip', 'subcategory' => 'lip_tint']) }}" 
               class="block px-4 py-3 hover:bg-gray-100 border-l-4 border-transparent hover:border-black">
                Lip
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Sidebar Toggle -->
                        <button class="p-2 rounded-md hover:bg-gray-100" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                            <span class="ml-2 font-medium">Daftar Produk</span>
                        </button>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Saldo -->
                        @auth
                        <div class="bg-gray-100 px-3 py-1 rounded-full">
                            <span class="text-sm font-medium">Saldo: Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}</span>
                        </div>

                        <!-- Cart -->
<a href="{{ route('cart.index') }}" class="relative p-2 hover:bg-gray-100 rounded-md">
    <i class="fas fa-shopping-cart"></i>
    @if(auth()->user()->cartItems->count() > 0)
    <span id="cartBadge" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
        {{ auth()->user()->cartItems->count() }}
    </span>
    @else
    <span id="cartBadge" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center hidden"></span>
    @endif
</a>

                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button class="p-2 hover:bg-gray-100 rounded-md" id="userMenuButton">
                                <i class="fas fa-user"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden" id="userMenu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const overlay = document.getElementById('overlay');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const userMenuButton = document.getElementById('userMenuButton');
            const userMenu = document.getElementById('userMenu');

            // Sidebar toggle
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                mainContent.classList.toggle('sidebar-open');
                overlay.classList.toggle('show');
            });

            // Overlay click to close sidebar
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                mainContent.classList.remove('sidebar-open');
                overlay.classList.remove('show');
            });

            // User menu toggle
            if (userMenuButton && userMenu) {
                userMenuButton.addEventListener('click', function() {
                    userMenu.classList.toggle('hidden');
                });

                // Close user menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>