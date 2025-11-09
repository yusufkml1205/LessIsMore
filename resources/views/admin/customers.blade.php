@extends('layouts.admin')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Data Pembeli</h1>
            <p class="text-gray-600 mt-2">Kelola semua customer yang terdaftar di sistem</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative">
                <input type="text" 
                       placeholder="Cari customer..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
    </div>
</div>

<!-- Customers Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <!-- Table Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900">
                Daftar Pembeli <span class="text-gray-500">({{ $customers->count() }})</span>
            </h2>
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
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
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($customers as $customer)
                <tr class="hover:bg-gray-50 transition-colors">
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
                                <div class="text-sm font-semibold text-gray-900">{{ $customer->name }}</div>
                                <div class="text-xs text-gray-500">ID: {{ $customer->id }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $customer->email }}</div>
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
        <div class="space-y-3">
            <div class="w-64 h-2 bg-gray-200 rounded mx-auto"></div>
            <div class="w-56 h-2 bg-gray-200 rounded mx-auto"></div>
            <div class="w-48 h-2 bg-gray-200 rounded mx-auto"></div>
        </div>
    </div>
    @endif

    <!-- Table Footer -->
    @if($customers->isNotEmpty())
    <div class="px-6 py-4 border-t border-gray-200">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-600">
                Menampilkan <span class="font-semibold">{{ $customers->count() }}</span> customers
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded text-sm font-medium text-gray-600 hover:bg-gray-50">
                    Previous
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded text-sm font-medium text-gray-600 hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.max-w-xs {
    max-width: 12rem;
}
</style>
@endsection