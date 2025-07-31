@extends('admin.home-conten')

@section('title', 'Mitra Section - Homepage Content Management')

@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Mitra Section</h2>
        <a href="{{ route('admin.homepage.mitra.create') }}" class="btn-add">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Mitra
        </a>
    </div>

    <!-- Entries Selection -->
    <div class="flex items-center mb-4">
        <span class="text-sm text-gray-700 mr-2">Show</span>
        <select class="border border-gray-300 rounded-md px-3 py-1 text-sm mr-2">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
        <span class="text-sm text-gray-700">entries</span>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Logo Mitra</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mitras ?? [] as $index => $mitra)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mitra->nama }}</td>
                    <td>
                        @if($mitra->logo)
                            <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->name }}" class="w-12 h-12 object-contain">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Logo</span>
                            </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.homepage.mitra.edit', $mitra->id) }}" class="action-btn action-btn-edit">
                            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.homepage.mitra.delete', $mitra->id) }}" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn action-btn-delete" onclick="return confirmDelete('Are you sure you want to delete this mitra?')">
                                <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-8 text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <span>No mitra data available</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection