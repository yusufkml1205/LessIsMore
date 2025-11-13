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
                <p class="text-2xl font-bold text-gray-900">{{ $customersCount ?? 0 }}</p>
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
                <p class="text-2xl font-bold text-gray-900">{{ $productsCount ?? 0 }}</p>
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
                <p class="text-2xl font-bold text-gray-900">{{ $ordersCount ?? 0 }}</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-green-600">
                <i class="fas fa-receipt mr-1"></i>
                <span>{{ $completedOrdersCount ?? 0 }} completed</span>
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
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="flex items-center text-sm text-green-600">
                <i class="fas fa-chart-line mr-1"></i>
                <span>Lifetime</span>
            </div>
        </div>
    </div>
</div>

<!-- DEBUG INFO -->
@php
    // **HANDLE VARIABLE YANG MUNGKIN KOSONG**
    $recentOrders = $recentOrders ?? collect();
    $recentOrdersCount = $recentOrders->count() ?? 0;
@endphp



<!-- Recent Orders & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Transaksi Terbaru</h2>
                <a href="{{ route('admin.customers') }}?tab=orders" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                    Lihat Semua
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentOrders->count() > 0)
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($recentOrders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#{{ $order->id }}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-gray-600 text-sm"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->user->name ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500">{{ $order->user->email ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900">
                                    <div class="font-medium">{{ $order->items->count() }} item(s)</div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        @foreach($order->items->take(2) as $item)
                                            {{ $item->product->name ?? 'N/A' }}@if(!$loop->last), @endif
                                        @endforeach
                                        @if($order->items->count() > 2)
                                            +{{ $order->items->count() - 2 }} lainnya
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->created_at->format('d M') }}</div>
                                <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @if($order->status == 'completed')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>Selesai
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times mr-1"></i>Dibatalkan
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shopping-cart text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum ada transaksi</h3>
                <p class="text-gray-500">Transaksi customer akan muncul di sini</p>
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
                    <span class="text-sm font-semibold text-gray-900">
                        Rp {{ number_format($averageOrderValue ?? 0, 0, ',', '.') }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Conversion Rate</span>
                    <span class="text-sm font-semibold text-gray-900">
                        {{ number_format($conversionRate ?? 0, 1) }}%
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Today's Orders</span>
                    <span class="text-sm font-semibold text-green-600">{{ $todayOrdersCount ?? 0 }}</span>
                </div>
            </div>
        </div>

        <!-- Recent Customers -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Pembeli Terbaru</h3>
            <div class="space-y-4">
                @if(isset($recentCustomers) && $recentCustomers->count() > 0)
                    @foreach($recentCustomers as $customer)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-xs">
                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                </span>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $customer->name }}</div>
                                <div class="text-xs text-gray-500">{{ $customer->email }}</div>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ $customer->orders_count ?? 0 }} orders
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Belum ada pembeli</p>
                </div>
                @endif
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
                        <span class="text-sm text-gray-600">Orders</span>
                    </div>
                    <span class="text-xs font-medium text-green-600">{{ $ordersCount ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection