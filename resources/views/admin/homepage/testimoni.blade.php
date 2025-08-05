@extends('admin.home-conten')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
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
                <!-- Sample Data Row 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-3 text-sm">1</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Ibu Mega</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Kepala Sekolah</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">
                        <img src="https://via.placeholder.com/40x40" alt="Profile" class="w-10 h-10 rounded-full object-cover">
                    </td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Lorem Ipsum</td>
                    <td class="border border-gray-200 px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.homepage.testimoni.edit', 1) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.homepage.testimoni.delete', 1) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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

                <!-- Sample Data Row 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-3 text-sm">2</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Pak Joko</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Pensiunan</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Lorem Ipsum</td>
                    <td class="border border-gray-200 px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.homepage.testimoni.edit', 2) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.homepage.testimoni.delete', 2) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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

                <!-- Sample Data Row 3 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-3 text-sm">3</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Pak Bowo</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Guru Baru</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Lorem Ipsum</td>
                    <td class="border border-gray-200 px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.homepage.testimoni.edit', 3) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.homepage.testimoni.delete', 3) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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

                <!-- Sample Data Row 4 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-3 text-sm">4</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Bu Rani</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Guru Honorer</td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </td>
                    <td class="border border-gray-200 px-4 py-3 text-sm">Lorem Ipsum</td>
                    <td class="border border-gray-200 px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.homepage.testimoni.edit', 4) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.homepage.testimoni.delete', 4) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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
            </tbody>
        </table>
    </div>

    <!-- Pagination (Optional) -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-600">
            Showing 1 to 4 of 4 entries
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
    });
</script>
@endpush
@endsection