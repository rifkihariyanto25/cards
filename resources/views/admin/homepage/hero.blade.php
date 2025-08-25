@extends('admin.home-conten')

@section('title', 'Hero Section - Cards Admin')
@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Hero Section</h2>
    </div>

    <form action="{{ route('admin.homepage.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $hero->title ?? '') }}" class="input-field" placeholder="Enter hero title">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul</label>
                    <textarea name="subtitle" class="textarea-field" rows="3" placeholder="Enter hero subtitle">{{ old('subtitle', $hero->subtitle ?? '') }}</textarea>
                    @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-4">
                <!-- Title Font Size -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran Font</label>
                    <select name="title_font_size" class="input-field">
                        <option value="24" {{ old('title_font_size', $hero->title_font_size ?? '') == '24' ? 'selected' : '' }}>24</option>
                        <option value="28" {{ old('title_font_size', $hero->title_font_size ?? '') == '28' ? 'selected' : '' }}>28</option>
                        <option value="32" {{ old('title_font_size', $hero->title_font_size ?? '') == '32' ? 'selected' : '' }}>32</option>
                        <option value="36" {{ old('title_font_size', $hero->title_font_size ?? '') == '36' ? 'selected' : '' }}>36</option>
                        <option value="40" {{ old('title_font_size', $hero->title_font_size ?? '') == '40' ? 'selected' : '' }}>40</option>
                        <option value="48" {{ old('title_font_size', $hero->title_font_size ?? '') == '48' ? 'selected' : '' }}>48</option>
                    </select>
                    @error('title_font_size')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle Font Size -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran Font Sub Judul</label>
                    <select name="subtitle_font_size" class="input-field">
                        <option value="14" {{ old('subtitle_font_size', $hero->subtitle_font_size ?? '') == '14' ? 'selected' : '' }}>14</option>
                        <option value="16" {{ old('subtitle_font_size', $hero->subtitle_font_size ?? '') == '16' ? 'selected' : '' }}>16</option>
                        <option value="18" {{ old('subtitle_font_size', $hero->subtitle_font_size ?? '') == '18' ? 'selected' : '' }}>18</option>
                        <option value="20" {{ old('subtitle_font_size', $hero->subtitle_font_size ?? '') == '20' ? 'selected' : '' }}>20</option>
                        <option value="24" {{ old('subtitle_font_size', $hero->subtitle_font_size ?? '') == '24' ? 'selected' : '' }}>24</option>
                    </select>
                    @error('subtitle_font_size')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

          <!-- Cover Image -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
            
            <!-- Image Upload Area -->
            <div class="image-upload-area cursor-pointer border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors" onclick="document.getElementById('hero-image').click()">
                <!-- Preview Container -->
                <div id="image-preview-container">
                    @if(isset($hero->image) && $hero->image)
                        <img id="preview-image" src="{{ asset('storage/' . $hero->image) }}" alt="Current Image" class="max-w-full max-h-48 rounded-lg mx-auto object-contain">
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
            <input type="file" id="hero-image" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
            
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
            <button type="submit" class="btn-primary">Save Changes</button>
        </div>
    </form>
</div>

@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="success-message">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="error-message">
        {{ session('error') }}
    </div>
@endif
@endsection

@section('extra-js')

<script>
    // Debug: Log data yang diterima
    
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
        
        const fileInput = document.getElementById('hero-image');
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

    // Drag and Drop functionality
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.querySelector('.image-upload-area');
        const fileInput = document.getElementById('hero-image');

        if (uploadArea && fileInput) {
            // Prevent default behavior
            uploadArea.addEventListener('dragover', function (e) {
                e.preventDefault();
                uploadArea.classList.add('border-blue-500', 'bg-blue-50');
            });

            uploadArea.addEventListener('dragleave', function () {
                uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
            });

            uploadArea.addEventListener('drop', function (e) {
                e.preventDefault();
                uploadArea.classList.remove('border-blue-500', 'bg-blue-50');

                const files = e.dataTransfer.files;
                if (files.length > 0 && files[0].type.startsWith('image/')) {
                    // Create new FileList
                    const dt = new DataTransfer();
                    dt.items.add(files[0]);
                    fileInput.files = dt.files;
                    previewImage(fileInput);
                }
            });
        }

        // Auto-hide success/error messages
        const successMsg = document.getElementById('success-message');
        const errorMsg = document.getElementById('error-message');
        
        if (successMsg) {
            setTimeout(() => {
                successMsg.style.opacity = '0';
                setTimeout(() => successMsg.remove(), 300);
            }, 3000);
        }
        
        if (errorMsg) {
            setTimeout(() => {
                errorMsg.style.opacity = '0';
                setTimeout(() => errorMsg.remove(), 300);
            }, 5000);
        }
    });
</script>



@endsection