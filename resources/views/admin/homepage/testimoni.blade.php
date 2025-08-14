@extends('admin.home-conten')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
    
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
    
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Testimoni Section</h2>
        <a href="{{ route('admin.homepage.testimoni.create') }}" class="btn-add">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Testimoni
        </a>
    </div>

    <!-- Filter Section -->
    <div class="mb-4 flex items-center gap-4">
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-600">Show</label>
            <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="text-sm text-gray-600">entries</span>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">No</th>
                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Profesi</th>
                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Gambar</th>
                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-medium text-gray-700">Komentar</th>
                    <th class="border border-gray-200 px-4 py-3 text-center text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($testimonies) > 0)
                    @foreach($testimonies as $index => $testimoni)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-3 text-sm">{{ $index + 1 }}</td>
                        <td class="border border-gray-200 px-4 py-3 text-sm">{{ $testimoni->nama }}</td>
                        <td class="border border-gray-200 px-4 py-3 text-sm">{{ $testimoni->profesi }}</td>
                        <td class="border border-gray-200 px-4 py-3 text-sm">
                            @if($testimoni->foto)
                                <img src="{{ asset('storage/' . $testimoni->foto) }}" alt="{{ $testimoni->nama }}" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-4 py-3 text-sm">{{ Str::limit($testimoni->komentar, 50) }}</td>
                        <td class="border border-gray-200 px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.homepage.testimoni.edit', $testimoni->id) }}" 
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.homepage.testimoni.delete', $testimoni->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="border border-gray-200 px-4 py-8 text-center text-gray-500">
                            Belum ada data testimoni. Silakan tambahkan testimoni baru.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Pagination (Optional) -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-600">
            @if(count($testimonies) > 0)
                Showing 1 to {{ count($testimonies) }} of {{ count($testimonies) }} entries
            @else
                Showing 0 to 0 of 0 entries
            @endif
        </div>
        <div class="flex gap-2">
            <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-gray-50 text-gray-400 cursor-not-allowed">
                Previous
            </button>
            <button class="px-3 py-1 border border-blue-500 bg-blue-500 text-white rounded text-sm">
                1
            </button>
            <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-gray-50 text-gray-400 cursor-not-allowed">
                Next
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Optional: Add any JavaScript functionality here
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Testimoni page loaded');
        
        // Close alert messages when close button is clicked
        const closeButtons = document.querySelectorAll('[role="alert"] svg[role="button"]');
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const alert = this.closest('[role="alert"]');
                alert.classList.add('opacity-0');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            });
        });
    });
</script>
@endpush
@endsection