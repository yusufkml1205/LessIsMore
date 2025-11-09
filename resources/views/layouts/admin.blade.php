<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Less Is More</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar-collapsed {
            width: 64px;
        }
        .sidebar-expanded {
            width: 256px;
        }
        .main-content {
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200 fixed w-full z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left side -->
                <div class="flex items-center">
                    <!-- Sidebar toggle -->
                    <button id="sidebarToggle" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    
                    <!-- Brand -->
                    <div class="ml-4 flex items-center">
                        <i class="fas fa-crown text-gray-700 text-xl"></i>
                        <span class="ml-2 text-xl font-semibold text-gray-900 hidden sm:block">Admin Panel</span>
                    </div>
                </div>

                <!-- Right side -->
                <div class="flex items-center space-x-4">
                    <!-- Store Link -->
                    <a href="{{ route('home') }}" 
                       class="hidden sm:flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md transition-colors">
                        <i class="fas fa-store mr-2"></i>
                        Ke Toko
                    </a>
                    
                    <!-- Mobile Store Link -->
                    <a href="{{ route('home') }}" 
                       class="sm:hidden p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md">
                        <i class="fas fa-store"></i>
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span class="hidden sm:block">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar sidebar-expanded bg-white shadow-sm border-r border-gray-200 fixed h-full z-40">
            <nav class="mt-8 px-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-black text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <i class="fas fa-tachometer-alt w-6 text-center"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.customers') }}" 
                       class="flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.customers') ? 'bg-black text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <i class="fas fa-users w-6 text-center"></i>
                        <span class="ml-3">Data Pembeli</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <main id="mainContent" class="main-content flex-1 ml-64 transition-all duration-300">
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            let sidebarExpanded = true;

            sidebarToggle.addEventListener('click', function() {
                sidebarExpanded = !sidebarExpanded;
                
                if (sidebarExpanded) {
                    sidebar.classList.remove('sidebar-collapsed');
                    sidebar.classList.add('sidebar-expanded');
                    mainContent.classList.remove('ml-16');
                    mainContent.classList.add('ml-64');
                    
                    // Show all text in sidebar
                    document.querySelectorAll('.sidebar span').forEach(span => {
                        span.classList.remove('hidden');
                    });
                } else {
                    sidebar.classList.remove('sidebar-expanded');
                    sidebar.classList.add('sidebar-collapsed');
                    mainContent.classList.remove('ml-64');
                    mainContent.classList.add('ml-16');
                    
                    // Hide all text in sidebar
                    document.querySelectorAll('.sidebar span').forEach(span => {
                        span.classList.add('hidden');
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>