@extends('admin.flexycazh-conten')

@section('title', 'Cards Admin - Create Flexycazh Feature')
@section('page-title', 'Flexycazh Page - Create New Feature')

@section('content')
<div class="section-card p-6">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Create New Feature</h2>
        <p class="text-sm text-gray-500 mt-1">Add a new feature to the Flexycazh section</p>
    </div>

    <form action="{{ route('admin.flexycazh.features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6">
            <!-- Nama -->
            <div>
                <label for="nama" class="form-label">Nama Feature <span class="text-red-500">*</span></label>
                <input type="text" name="nama" id="nama" class="form-input" value="{{ old('nama') }}" required>
                @error('nama')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="form-label">Gambar <span class="text-red-500">*</span></label>
                <div class="mt-1 flex items-center">
                    <label class="block w-full">
                        <span class="sr-only">Choose file</span>
                        <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded file:border-0
                            file:text-sm file:font-semibold
                            file:bg-cards-teal file:text-white
                            hover:file:bg-teal-700
                        " required>
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                @error('gambar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-input" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="form-label">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status" class="form-input">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.flexycazh.features') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create Feature
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Any additional JavaScript for the form
</script>
@endpush