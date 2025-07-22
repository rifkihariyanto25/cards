@extends('admin.parent-conten')

@section('title', 'Download Section - Cards Admin')
@section('page-title', 'Cards Parents - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Download Section - Parents</h2>
    </div>

    <form action="{{ route('admin.parents.download.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $Download->title ?? '') }}" class="input-field" placeholder="Enter Download title">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul</label>
                    <textarea name="subtitle" class="textarea-field" rows="3" placeholder="Enter Download subtitle">{{ old('subtitle', $Download->subtitle ?? '') }}</textarea>
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
            <div class="image-upload-area" onclick="document.getElementById('download-image').click()">
                @if(isset($hero->image) && $hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Current Image" class="max-w-full max-h-32 rounded-lg mx-auto">
                @else
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-gray-500">Drop Your File Here or Browse</p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</p>
                    </div>
                @endif
            </div>
            <input type="file" id="download-image" name="image" accept="image/*" class="hidden">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Layout Position -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Posisi Layout
            </label>
            <div class="flex space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="layout_position" value="image_left" 
                           {{ ($content['layout_position'] ?? 'image_left') == 'image_left' ? 'checked' : '' }}
                           class="mr-2">
                    <span>Gambar di Kiri</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="layout_position" value="image_right" 
                           {{ ($content['layout_position'] ?? 'image_left') == 'image_right' ? 'checked' : '' }}
                           class="mr-2">
                    <span>Gambar di Kanan</span>
                </label>
            </div>
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
    const previewImg = document.getElementById('preview-img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection