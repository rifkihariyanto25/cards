@extends('admin.flexycazh-conten')

@section('title', 'Flexycazh Features - Cards Admin')
@section('page-title', 'Flexycazh Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Features Section - Flexycazh</h2>
    </div>
    
    <form action="{{ route('admin.flexycazh.features') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Main Title -->
        <div class="mb-2">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-3">Judul</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   class="input-field" 
                   value="{{ old('title', $features->title ?? '') }}"
                   placeholder="Masukkan judul utama features">
            <div class="flex items-center justify-end mt-3">
                <span class="text-sm text-gray-500 mr-3">Ukuran Font</span>
                <select name="title_font_size" class="w-20 px-3 py-2 border border-gray-300 rounded-md  text-sm">
                    <option value="24" {{ (old('title_font_size', $features->title_font_size ?? '36') == '24') ? 'selected' : '' }}>24</option>
                    <option value="28" {{ (old('title_font_size', $features->title_font_size ?? '36') == '28') ? 'selected' : '' }}>28</option>
                    <option value="32" {{ (old('title_font_size', $features->title_font_size ?? '36') == '32') ? 'selected' : '' }}>32</option>
                    <option value="36" {{ (old('title_font_size', $features->title_font_size ?? '36') == '36') ? 'selected' : '' }}>36</option>
                    <option value="40" {{ (old('title_font_size', $features->title_font_size ?? '36') == '40') ? 'selected' : '' }}>40</option>
                    <option value="44" {{ (old('title_font_size', $features->title_font_size ?? '36') == '44') ? 'selected' : '' }}>44</option>
                    <option value="48" {{ (old('title_font_size', $features->title_font_size ?? '36') == '48') ? 'selected' : '' }}>48</option>
                </select>
            </div>
        </div>

        <!-- Feature 1 -->
        <div class=" rounded-lg p-2 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Fitur-1</h3>
            
            <!-- Feature 1 Title -->
            <div class="mb-6">
                <label for="feature1_title" class="block text-sm font-medium text-gray-700 mb-3">Judul</label>
                <input type="text" 
                       id="feature1_title" 
                       name="feature1_title" 
                       class="input-field" 
                       value="{{ old('feature1_title', $features->feature1_title ?? '') }}"
                       placeholder="Masukkan judul fitur 1">
                <div class="flex items-center justify-end mt-3">
                    <span class="text-sm text-gray-500 mr-3">Ukuran Font</span>
                    <select name="feature1_title_font_size" class="w-20 px-3 py-2 border border-gray-300 rounded-md  text-sm">
                        <option value="16" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '16') ? 'selected' : '' }}>16</option>
                        <option value="18" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '18') ? 'selected' : '' }}>18</option>
                        <option value="20" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '20') ? 'selected' : '' }}>20</option>
                        <option value="24" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '24') ? 'selected' : '' }}>24</option>
                        <option value="28" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '28') ? 'selected' : '' }}>28</option>
                        <option value="32" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '32') ? 'selected' : '' }}>32</option>
                        <option value="36" {{ (old('feature1_title_font_size', $features->feature1_title_font_size ?? '36') == '36') ? 'selected' : '' }}>36</option>
                    </select>
                </div>
            </div>

            <!-- Feature 1 Subtitle -->
            <div class="mb-6">
                <label for="feature1_subtitle" class="block text-sm font-medium text-gray-700 mb-3">Sub Judul</label>
                <textarea id="feature1_subtitle" 
                          name="feature1_subtitle" 
                          class="textarea-field" 
                          rows="3"
                          placeholder="Masukkan sub judul atau deskripsi fitur 1">{{ old('feature1_subtitle', $features->feature1_subtitle ?? '') }}</textarea>
                <div class="flex items-center justify-end mt-3">
                    <span class="text-sm text-gray-500 mr-3">Ukuran Font</span>
                    <select name="feature1_subtitle_font_size" class="w-20 px-3 py-2 border border-gray-300 rounded-md  text-sm">
                        <option value="12" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '12') ? 'selected' : '' }}>12</option>
                        <option value="14" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '14') ? 'selected' : '' }}>14</option>
                        <option value="16" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '16') ? 'selected' : '' }}>16</option>
                        <option value="18" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '18') ? 'selected' : '' }}>18</option>
                        <option value="20" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '20') ? 'selected' : '' }}>20</option>
                        <option value="24" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '24') ? 'selected' : '' }}>24</option>
                        <option value="36" {{ (old('feature1_subtitle_font_size', $features->feature1_subtitle_font_size ?? '36') == '36') ? 'selected' : '' }}>36</option>
                    </select>
                </div>
            </div>

            <!-- Feature 1 Icon -->
            <div class="mb-6">
                <label for="feature1_icon" class="block text-sm font-medium text-gray-700 mb-3">Icon</label>
                <div class="image-upload-area" onclick="document.getElementById('feature1_icon').click()">
                    @if(isset($features->feature1_icon) && $features->feature1_icon)
                        <img src="{{ asset('storage/' . $features->feature1_icon) }}" alt="Feature 1 Icon" class="max-w-full max-h-32 rounded-lg mx-auto mb-4">
                    @endif
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-gray-600">Drop Your File Here or Browse</p>
                    </div>
                </div>
                <input type="file" 
                       id="feature1_icon" 
                       name="feature1_icon" 
                       class="hidden" 
                       accept="image/*">
                
                <!-- Upload Button -->
                <div class="mt-4">
                    <button type="button" 
                            class="btn-primary"
                            onclick="document.getElementById('feature1_icon').click()">
                        Upload
                    </button>
                </div>
            </div>
        </div>

        <!-- Additional Features (Feature 2, 3, etc.) can be added here with similar structure -->
        
        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <div class="flex space-x-4">
                <button type="button" class="btn-secondary" onclick="resetForm()">
                    Reset
                </button>
                <button type="submit" class="btn-primary">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>

@if(session('success'))
<div id="success-alert" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div id="error-alert" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

@section('extra-js')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        
        if (successAlert) {
            successAlert.style.opacity = '0';
            setTimeout(() => successAlert.remove(), 300);
        }
        
        if (errorAlert) {
            errorAlert.style.opacity = '0';
            setTimeout(() => errorAlert.remove(), 300);
        }
    }, 5000);

    // Reset form function
    function resetForm() {
        if (confirm('Are you sure you want to reset all changes? This will clear all unsaved data.')) {
            document.querySelector('form').reset();
            
            // Clear image previews
            document.querySelectorAll('.image-upload-area img').forEach(img => {
                img.remove();
            });
            
            // Restore default upload area content
            document.querySelectorAll('.image-upload-area').forEach(area => {
                const hasImage = area.querySelector('img');
                if (!hasImage) {
                    area.innerHTML = `
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop Your File Here or Browse</p>
                        </div>
                    `;
                }
            });
        }
    }

    // Enhanced image upload preview
    function setupImageUpload(inputId, previewContainer) {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('Please select a valid image file.');
                        return;
                    }
                    
                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB.');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="max-w-full max-h-32 rounded-lg mx-auto mb-4">
                            <div class="flex flex-col items-center">
                                <p class="text-sm text-gray-600 mb-2">File: ${file.name}</p>
                                <p class="text-xs text-gray-500">Click to change image</p>
                            </div>
                        `;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    // Initialize image upload functionality
    document.addEventListener('DOMContentLoaded', function() {
        setupImageUpload('feature1_icon', document.querySelector('.image-upload-area'));
    });

    // Drag and drop functionality
    document.querySelectorAll('.image-upload-area').forEach(area => {
        area.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-cards-teal', 'bg-blue-50');
        });
        
        area.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-cards-teal', 'bg-blue-50');
        });
        
        area.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-cards-teal', 'bg-blue-50');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const input = this.parentElement.querySelector('input[type="file"]');
                if (input) {
                    input.files = files;
                    input.dispatchEvent(new Event('change'));
                }
            }
        });
    });
</script>
@endsection