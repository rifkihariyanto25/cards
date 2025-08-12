@extends('admin.edu-content')

@section('title', 'About Section - Edu Admin')
@section('page-title', 'Edu Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Edu About Section</h2>
    </div>

    <form action="{{ route('admin.edu.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $aboutData->title ?? '') }}" class="input-field" placeholder="Enter about title">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub judul</label>
                    <textarea name="subtitle" class="textarea-field" rows="5" placeholder="Enter subtitle">{{ old('subtitle', $aboutData->subtitle ?? '') }}</textarea>
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
                        @foreach([24,28,32,36,40,48] as $size)
                            <option value="{{ $size }}" {{ old('title_font_size', $aboutData->title_font_size ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    @error('title_font_size')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle Font Size -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran Font Sub Judul</label>
                    <select name="subtitle_font_size" class="input-field">
                        @foreach([14,16,18,20,24] as $size)
                            <option value="{{ $size }}" {{ old('subtitle_font_size', $aboutData->subtitle_font_size ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
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
    <div class="image-upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 cursor-pointer hover:border-blue-500 transition-colors"
         onclick="document.getElementById('about-image').click()">
        
        <div id="upload-placeholder" class="text-center {{ isset($aboutData) && $aboutData->cover_image ? 'hidden' : '' }}">
            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
            </svg>
            <p class="text-gray-500">
                Drop Your File Here or Browse
            </p>
            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
        </div>

        @if(isset($aboutData) && $aboutData->cover_image)
            <img 
                id="image-preview" 
                class="max-w-full max-h-32 rounded-lg mx-auto mt-4" 
                src="{{ asset('storage/' . $aboutData->cover_image) }}" 
                alt="Image Preview"
            />
        @else
            <img id="image-preview" class="max-w-full max-h-32 rounded-lg mx-auto mt-4 hidden" src="" alt="Image Preview"/>
        @endif
    </div>
    
    <input type="file" id="about-image" name="cover_image" accept="image/*" class="hidden" onchange="previewImage(this)">
    @error('cover_image')
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
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
