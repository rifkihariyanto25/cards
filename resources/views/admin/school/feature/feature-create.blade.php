@extends('admin.school-conten')

@section('title', 'School Features - Cards Admin')
@section('page-title', 'School Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Features Section - School</h2>
        <a href="{{ route('admin.school.features') }}" class="btn-back">
            <span class="mr-2">←</span>Kembali
        </a>
    </div>

    <form action="{{ route('admin.school.features.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Nama Produk -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Fitur</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   value="{{ old('nama') }}"
                   class="input-field @error('nama') border-red-500 @enderror" 
                   placeholder="Masukkan nama fitur"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fitur Image -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Fitur Image</label>
            
            <!-- Image Upload Area -->
            <div class="image-upload-area cursor-pointer border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors" onclick="document.getElementById('feature-image').click()">
                <!-- Preview Container -->
                <div id="image-preview-container">
                    @if(isset($feature->image) && $feature->image)
                        <img id="preview-image" src="{{ asset('storage/' . $feature->image) }}" alt="Current Image" class="max-w-full max-h-48 rounded-lg mx-auto object-contain">
                        <div class="mt-3">
                            <button type="button" class="text-sm text-red-600 hover:text-red-800" onclick="removeImage(event)">Remove Image</button>
                        </div>
                    @else
                        <!-- Default Upload UI -->
                        <div id="upload-placeholder">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-500">Drop Your File Here or Browse</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
                        </div>
                        
                        <!-- Hidden Preview Template (will be shown when image selected) -->
                        <div id="preview-template" class="hidden">
                            <img id="preview-image" src="" alt="Preview" class="max-w-full max-h-48 rounded-lg mx-auto object-contain">
                            <div class="mt-3">
                                <button type="button" class="text-sm text-red-600 hover:text-red-800" onclick="removeImage(event)">Remove Image</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Hidden File Input -->
            <input type="file" id="feature-image" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
            
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Deskripsi Produk -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Produk (Optional)</label>
            <textarea id="deskripsi" 
                      name="deskripsi" 
                      class="textarea-field @error('deskripsi') border-red-500 @enderror" 
                      placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="status" 
                    name="status" 
                    class="input-field @error('status') border-red-500 @enderror">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div> -->

        <!-- Submit Button -->
        <div class="flex justify-end space-x-4">
            <button type="submit" class="btn-primary">Save</button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const previewTemplate = document.getElementById('preview-template');
        const previewImage = document.getElementById('preview-image');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('File size must be less than 10MB');
                input.value = '';
                return;
            }
            
            // Validate file type
            if (!file.type.match('image.*')) {
                alert('Please select a valid image file');
                input.value = '';
                return;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Hide upload placeholder
                if (uploadPlaceholder) {
                    uploadPlaceholder.style.display = 'none';
                }
                
                // Show and update preview
                if (previewTemplate) {
                    previewTemplate.classList.remove('hidden');
                }
                
                if (previewImage) {
                    previewImage.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(file);
        }
    }
    
    function removeImage(event) {
        event.preventDefault();
        event.stopPropagation();
        
        const fileInput = document.getElementById('feature-image');
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const previewTemplate = document.getElementById('preview-template');
        
        // Clear file input
        fileInput.value = '';
        
        // Show upload placeholder
        if (uploadPlaceholder) {
            uploadPlaceholder.style.display = 'block';
        }
        
        // Hide preview
        if (previewTemplate) {
            previewTemplate.classList.add('hidden');
        }
    }
    
    // Auto hide success/error messages
    setTimeout(function() {
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);

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