@extends('layouts.admin')

@section('content')
<!-- Header -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
    <p class="text-gray-600 mt-2">Selamat datang di panel administrasi Less Is More</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Customers -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Pembeli</p>
                <p class="text-2xl font-bold text-gray-900">{{ $customersCount }}</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-green-600">
                <i class="fas fa-arrow-up mr-1"></i>
                <span>Active users</span>
            </div>
        </div>
    </div>

    <!-- Total Products -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Produk</p>
                <p class="text-2xl font-bold text-gray-900">{{ $productsCount }}</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-cube mr-1"></i>
                <span>Available items</span>
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-purple-600 text-xl"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Transaksi</p>
                <p class="text-2xl font-bold text-gray-900">0</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-receipt mr-1"></i>
                <span>All time</span>
            </div>
        </div>
    </div>

    <!-- Total Revenue -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-wallet text-orange-600 text-xl"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                <p class="text-2xl font-bold text-gray-900">Rp 0</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-chart-line mr-1"></i>
                <span>Lifetime</span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Customers & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Customers -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-900">Pembeli Terbaru</h2>
                    <a href="{{ route('admin.customers') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Dalam bagian Recent Customers, update thead -->
<thead>
    <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instansi</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
    </tr>
</thead>

<!-- Update tbody -->
<tbody class="divide-y divide-gray-200">
    @foreach($recentCustomers as $customer)
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="px-4 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-600 text-sm"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ $customer->name }}</div>
                    <div class="text-sm text-gray-500">{{ $customer->email }}</div>
                </div>
            </div>
        </td>
        <td class="px-4 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $customer->age }}</div>
            <div class="text-sm text-gray-500">tahun</div>
        </td>
        <td class="px-4 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $customer->instance }}</div>
        </td>
        <td class="px-4 py-4 whitespace-nowrap">
            <div class="text-sm font-semibold text-gray-900">
                Rp {{ number_format($customer->balance, 0, ',', '.') }}
            </div>
        </td>
        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $customer->created_at->format('d M Y') }}
        </td>
    </tr>
    @endforeach
</tbody>
                    </table>
                </div>
                
                @if($recentCustomers->isEmpty())
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-gray-400 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum ada pembeli</h3>
                    <p class="text-gray-500">Customer yang mendaftar akan muncul di sini</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="space-y-6">
        <!-- Quick Stats -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Avg. Order Value</span>
                    <span class="text-sm font-semibold text-gray-900">Rp 0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Conversion Rate</span>
                    <span class="text-sm font-semibold text-gray-900">0%</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Customer Satisfaction</span>
                    <span class="text-sm font-semibold text-green-600">-</span>
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">System Status</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Website</span>
                    </div>
                    <span class="text-xs font-medium text-green-600">Online</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Database</span>
                    </div>
                    <span class="text-xs font-medium text-green-600">Connected</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Payment</span>
                    </div>
                    <span class="text-xs font-medium text-green-600">Active</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection