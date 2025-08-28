@extends('admin.flexycazh-conten')

@section('title', 'Cards Admin - Flexycazh Features Management')
@section('page-title', 'Flexycazh Page - Features Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Features Section</h2>
        <a href="{{ route('admin.flexycazh.features.create') }}" class="btn-add">
            <span class="mr-2">+</span>Tambah Feature
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
                    <th class="w-32">Gambar</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th class="w-32">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($features ?? [] as $index => $feature)
<tr>
    <td class="text-center">{{ $index + 1 }}</td>
    <td>{{ $feature->nama ?? 'Flexycazh Feature' }}</td>
    <td class="text-center">
        @if(isset($feature->gambar) && $feature->gambar)
            <img src="{{ asset('storage/' . $feature->gambar) }}" 
                 alt="Feature Image" 
                 class="w-16 h-16 object-cover rounded mx-auto">
        @else
            <div class="w-16 h-16 bg-gray-200 rounded mx-auto flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-400" ...></svg>
            </div>
        @endif
    </td>
    <td>{{ $feature->deskripsi ?? '-' }}</td>
    <td>
        <span class="px-2 py-1 rounded text-xs font-medium {{ $feature->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
            {{ ucfirst($feature->status ?? 'active') }}
        </span>
    </td>
    <td>
        <a href="{{ route('admin.flexycazh.features.edit', $feature->id) }}" class="action-btn action-btn-edit">Edit</a>
        <form action="{{ route('admin.flexycazh.features.destroy', $feature->id) }}" method="POST" class="inline" onsubmit="return confirmDelete('Are you sure you want to delete this feature?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn action-btn-delete">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-8 text-gray-500">No features found</td>
</tr>
@endforelse

            </tbody>
        </table>
    </div>

    @if(isset($features) && count($features) > 0)
    <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Showing {{ count($features) }} of {{ count($features) }} entries
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

<script>
    function confirmDelete(message) {
        return confirm(message);
    }
</script>
@endsection
