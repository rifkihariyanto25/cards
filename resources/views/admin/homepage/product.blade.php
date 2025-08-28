@extends('admin.home-conten')

@section('title', 'Cards Admin - Product Management')
@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Produk Section</h2>
        <a href="{{ route('admin.homepage.product.create') }}" class="btn-add">
             <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    <div class="mb-4 flex items-center gap-4">
        <label class="text-sm text-gray-600">Show</label>
        <select class="border border-gray-300 rounded px-3 py-1 text-sm">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
        <span class="text-sm text-gray-600">entries</span>
    </div>

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th class="w-16">No</th>
                    <th>Nama</th>
                    <th class="w-32">Gambar Produk</th>
                    <th>Link</th>
                    <th class="w-32">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products ?? [] as $index => $product)
<tr>
    <td class="text-center">{{ $index + 1 }}</td>
    <td>{{ $product->nama ?? 'Cards Edu' }}</td>
    <td class="text-center">
        @if(isset($product->gambar) && $product->gambar)
            <img src="{{ asset('storage/' . $product->gambar) }}" 
                 alt="Product Image" 
                 class="w-16 h-16 object-cover rounded mx-auto">
        @else
            <div class="w-16 h-16 bg-gray-200 rounded mx-auto flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2
                             l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6
                             20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 
                             00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        @endif
    </td>
    <td>
        @if(isset($product->link) && $product->link)
            <a href="{{ $product->link }}" target="_blank" 
               class="text-blue-600 hover:underline">{{ $product->link }}</a>
        @else
            <span class="text-gray-400">-</span>
        @endif
    </td>
    <td>
        <a href="{{ route('admin.homepage.product.edit', $product->id ?? 1) }}" 
           class="action-btn action-btn-edit">
            ✏️
        </a>
        <form action="{{ route('admin.homepage.product.delete', $product->id ?? 1) }}" 
              method="POST" 
              class="inline"
              onsubmit="return confirmDelete('Are you sure you want to delete this product?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn action-btn-delete">🗑️</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center py-8 text-gray-500">No products found</td>
</tr>
@endforelse

            </tbody>
        </table>
    </div>

    @if(isset($products) && count($products) > 0)
    <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Showing {{ count($products) }} of {{ count($products) }} entries
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-3 py-1 text-sm border border-gray-300 rounded bg-gray-50 text-gray-500 cursor-not-allowed">Previous</button>
            <button class="px-3 py-1 text-sm border border-gray-300 rounded bg-cards-teal text-white">1</button>
            <button class="px-3 py-1 text-sm border border-gray-300 rounded bg-gray-50 text-gray-500 cursor-not-allowed">Next</button>
        </div>
    </div>
    @endif
</div>

@if(session('success'))
<div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="success-message">
    {{ session('success') }}
</div>
<script>
    setTimeout(() => {
        document.getElementById('success-message').remove();
    }, 3000);
</script>
@endif
@endsection