@extends('admin.canteen-conten')

@section('title', 'Cards Admin - Edit Canteen Feature')
@section('page-title', 'Canteen Page - Edit Feature')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Edit Feature</h2>
        <a href="{{ route('admin.canteen.features') }}" 
           class="bg-cyan-700 hover:bg-cyan-800 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.canteen.features.update', $feature->id ?? 1) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Field -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   value="{{ old('nama', $feature->nama ?? '') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2  focus:border-blue-500 outline-none transition-colors"
                   placeholder="Masukkan nama feature"
                   required>
            @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Field -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea 
                   id="deskripsi" 
                   name="deskripsi" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2  focus:border-blue-500 outline-none transition-colors"
                   placeholder="Masukkan deskripsi feature"
                   rows="4">{{ old('deskripsi', $feature->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

         <!-- Fitur Image -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Fitur Image</label>
            
            <!-- Current Image -->
            @if($feature->gambar)
            <div class="mb-3">
                <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                <img src="{{ asset('storage/' . $feature->gambar) }}" 
                     alt="Current Feature Image" 
                     class="max-h-48 rounded-lg">
            </div>
            @endif

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
            <input type="file" id="feature-image" name="gambar" accept="image/*" class="hidden" onchange="previewImage(this)">
            
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status Field -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="status" 
                    name="status" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2  focus:border-blue-500 outline-none transition-colors"
                    required>
                <option value="active" {{ (old('status', $feature->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ (old('status', $feature->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-3">
            <button type="submit" 
                    class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-2 rounded-lg transition-colors focus:ring-2  focus:ring-offset-2">
                Update
            </button>
        </div>
    </form>
</div>

@push('scripts')
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
@endpush
@endsection