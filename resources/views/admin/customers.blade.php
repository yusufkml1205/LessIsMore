@extends('layouts.admin')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Data Pembeli</h1>
            <p class="text-gray-600 mt-2">Kelola semua customer dan transaksi di sistem</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative">
                <input type="text" id="searchInput" 
                       placeholder="Cari customer..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="mb-6 border-b border-gray-200">
    <nav class="-mb-px flex space-x-8">
        <button id="customersTab" class="tab-button border-b-2 border-black text-black py-4 px-1 text-sm font-medium">
            <i class="fas fa-users mr-2"></i>Data Pembeli
        </button>
        <button id="ordersTab" class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-4 px-1 text-sm font-medium">
            <i class="fas fa-shopping-cart mr-2"></i>Riwayat Transaksi
        </button>
    </nav>
</div>

<!-- Customers Table -->
<div id="customersContent" class="tab-content">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">
                    Daftar Pembeli <span class="text-gray-500">({{ $customers->count() }})</span>
                </h2>
                <div class="text-sm text-gray-600">
                    Total: {{ $customers->count() }} customers
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instansi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Suku</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="customersTableBody">
                    @foreach($customers as $customer)
                    <tr class="hover:bg-gray-50 transition-colors customer-row">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">
                                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-semibold text-gray-900 customer-name">{{ $customer->name }}</div>
                                    <div class="text-xs text-gray-500">ID: {{ $customer->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 customer-email">{{ $customer->email }}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $customer->age }}</div>
                            <div class="text-xs text-gray-500">tahun</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $customer->instance }}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $customer->ethnicity }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $customer->occupation }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            @if($customer->gender == 'male')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-mars mr-1"></i>Laki-laki
                                </span>
                            @elseif($customer->gender == 'female')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                    <i class="fas fa-venus mr-1"></i>Perempuan
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-user mr-1"></i>Lainnya
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">
                                Rp {{ number_format($customer->balance, 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ $customer->orders_count }} orders
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $customer->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $customer->created_at->format('H:i') }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        @if($customers->isEmpty())
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-users text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada pembeli terdaftar</h3>
            <p class="text-gray-500 max-w-md mx-auto mb-6">
                Customer yang mendaftar melalui website akan muncul di daftar ini.
            </p>
        </div>
        @endif
    </div>
</div>

<!-- Orders Table -->
<div id="ordersContent" class="tab-content hidden">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">
                    Riwayat Transaksi <span class="text-gray-500">({{ $allOrders->count() }})</span>
                </h2>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">
                        Total Revenue: <span class="font-semibold text-green-600">Rp {{ number_format($allOrders->sum('total_amount'), 0, ',', '.') }}</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barang yang Dibeli</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Checkout</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($allOrders as $order)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">#{{ $order->id }}</div>
                            <div class="text-xs text-gray-500">{{ $order->items->count() }} items</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">
                                            {{ strtoupper(substr($order->user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4">
    <div class="text-sm text-gray-900 space-y-1 max-w-xs">
        @foreach($order->items as $item)
        <div class="flex justify-between items-start">
            <div class="flex-1">
                <div class="font-medium">{{ $item->product->name }}</div>
                <div class="text-xs text-gray-500 mt-1">
                    Shade: {{ $item->variant->shade_name }} • Qty: {{ $item->quantity }}
                </div>
            </div>
            <!-- HAPUS bagian harga per item di sini -->
        </div>
        @endforeach
    </div>
</td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $order->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i:s') }}</div>
                            <div class="text-xs text-gray-400">({{ $order->created_at->diffForHumans() }})</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            @if($order->status == 'completed')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i>Completed
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <i class="fas fa-times mr-1"></i>Cancelled
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($allOrders->isEmpty())
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-receipt text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada transaksi</h3>
            <p class="text-gray-500">Transaksi customer akan muncul di sini setelah mereka melakukan checkout</p>
        </div>
        @endif

        <!-- Table Footer -->
        @if($allOrders->isNotEmpty())
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-semibold">{{ $allOrders->count() }}</span> transaksi
                </div>
                <div class="text-sm text-gray-600">
                    Total Revenue: <span class="font-semibold text-green-600">Rp {{ number_format($allOrders->sum('total_amount'), 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const customersTab = document.getElementById('customersTab');
    const ordersTab = document.getElementById('ordersTab');
    const customersContent = document.getElementById('customersContent');
    const ordersContent = document.getElementById('ordersContent');
    const searchInput = document.getElementById('searchInput');
    const customerRows = document.querySelectorAll('.customer-row');

    // Tab functionality
    customersTab.addEventListener('click', function() {
        // Activate customers tab
        customersTab.classList.add('border-black', 'text-black');
        customersTab.classList.remove('border-transparent', 'text-gray-500');
        ordersTab.classList.add('border-transparent', 'text-gray-500');
        ordersTab.classList.remove('border-black', 'text-black');
        
        // Show customers content
        customersContent.classList.remove('hidden');
        ordersContent.classList.add('hidden');
    });

    ordersTab.addEventListener('click', function() {
        // Activate orders tab
        ordersTab.classList.add('border-black', 'text-black');
        ordersTab.classList.remove('border-transparent', 'text-gray-500');
        customersTab.classList.add('border-transparent', 'text-gray-500');
        customersTab.classList.remove('border-black', 'text-black');
        
        // Show orders content
        ordersContent.classList.remove('hidden');
        customersContent.classList.add('hidden');
    });

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        customerRows.forEach(row => {
            const customerName = row.querySelector('.customer-name').textContent.toLowerCase();
            const customerEmail = row.querySelector('.customer-email').textContent.toLowerCase();
            
            if (customerName.includes(searchTerm) || customerEmail.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>

<style>
.tab-button {
    transition: all 0.2s ease-in-out;
}
.tab-content {
    transition: opacity 0.2s ease-in-out;
}
.max-w-xs {
    max-width: 12rem;
}
.max-w-md {
    max-width: 28rem;
}
</style>
@endpush
@endsection