@extends('admin.edu-content')

@section('title', 'Edit Edu Feature - Cards Admin')
@section('page-title', 'Edu Page - Edit Feature')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-cards-teal">Edit Feature - Edu</h2>
        <a href="{{ route('admin.edu.features') }}" class="btn-back">
            <span class="mr-2">←</span>Kembali
        </a>
    </div>

    <form action="{{ route('admin.edu.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Feature -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Fitur</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   value="{{ old('nama', $feature->nama) }}"
                   class="input-field @error('nama') border-red-500 @enderror" 
                   placeholder="Masukkan nama fitur"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="status" 
                    name="status" 
                    class="input-field @error('status') border-red-500 @enderror">
                <option value="active" {{ old('status', $feature->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $feature->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar Feature -->
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar Fitur</label>
            
            <!-- Current Image -->
            @if($feature->gambar)
            <div class="mb-3">
                <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                <img src="{{ asset('storage/' . $feature->gambar) }}" 
                     alt="Current Feature Image" 
                     class="max-h-48 rounded-lg">
            </div>
            @endif
            
            <!-- Upload Area -->
            <div id="upload-area" 
                class="cursor-pointer border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-cards-teal transition"
                onclick="document.getElementById('gambar').click()">

                <!-- Preview (kosong dulu) -->
                <img id="preview-img" src="" 
                    class="hidden max-h-48 rounded-lg mx-auto mb-2" 
                    alt="Preview">

                <!-- Default placeholder -->
                <div id="upload-placeholder">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-sm text-gray-500">Click to upload a new image or drag and drop</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                </div>
            </div>

            <!-- Hidden file input -->
            <input type="file" 
                   id="gambar" 
                   name="gambar" 
                   class="hidden" 
                   accept="image/*"
                   onchange="previewImage(this)">

            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea id="deskripsi" 
                      name="deskripsi" 
                      rows="4" 
                      class="input-field @error('deskripsi') border-red-500 @enderror" 
                      placeholder="Masukkan deskripsi fitur">{{ old('deskripsi', $feature->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="btn-primary">
                Update Feature
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview-img');
        const placeholder = document.getElementById('upload-placeholder');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Drag and drop functionality
    const uploadArea = document.getElementById('upload-area');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight() {
        uploadArea.classList.add('border-cards-teal', 'bg-gray-50');
    }
    
    function unhighlight() {
        uploadArea.classList.remove('border-cards-teal', 'bg-gray-50');
    }
    
    uploadArea.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        const fileInput = document.getElementById('gambar');
        
        fileInput.files = files;
        previewImage(fileInput);
    }
</script>
@endsection