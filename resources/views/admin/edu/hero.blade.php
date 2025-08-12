@extends('admin.edu-content')

@section('title', 'Hero Section - Edu Admin')
@section('page-title', 'Edu Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Edu Hero Section</h2>
    </div>

    <form action="{{ route('admin.edu.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $eduHero->title ?? '') }}" class="input-field" placeholder="Enter hero title">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul</label>
                    <textarea name="subtitle" class="textarea-field" rows="3" placeholder="Enter hero subtitle">{{ old('subtitle', $eduHero->subtitle ?? '') }}</textarea>
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
                            <option value="{{ $size }}" {{ old('title_font_size', $eduHero->title_font_size ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
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
                            <option value="{{ $size }}" {{ old('subtitle_font_size', $eduHero->subtitle_font_size ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
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
            <div class="image-upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 cursor-pointer hover:border-blue-500 transition-colors" onclick="document.getElementById('hero-image').click()">
                <div id="upload-placeholder" class="text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-gray-500">
                        @if(isset($eduHero) && $eduHero->cover_image)
                            Drop New File Here or Browse to Replace
                        @else
                            Drop Your File Here or Browse
                        @endif
                    </p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
                </div>
                
                <img 
                    id="image-preview" 
                    class="max-w-full max-h-32 rounded-lg mx-auto mt-4 {{ isset($eduHero) && $eduHero->cover_image ? '' : 'hidden' }}" 
                    src="{{ isset($eduHero) && $eduHero->cover_image ? asset('storage/' . $eduHero->cover_image) : '' }}" 
                    alt="Image Preview"
                />
            </div>
            
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
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (placeholder) {
                    placeholder.innerHTML = `
                        <div class="text-center">
                            <svg class="w-8 h-8 mx-auto text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <p class="text-green-600 text-sm">New image selected: ${file.name}</p>
                            <p class="text-xs text-gray-400 mt-1">Click to change or drag new file</p>
                        </div>
                    `;
                }
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
