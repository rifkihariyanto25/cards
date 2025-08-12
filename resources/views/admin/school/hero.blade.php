@extends('admin.school-conten')

@section('title', 'Hero Section - School')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Hero Section - School</h2>
    </div>

    <form action="{{ route('admin.school.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Main Title -->
        <div class="mb-6">
            <label for="main_title" class="block text-sm font-medium text-gray-700 mb-2">
                Judul Utama
            </label>
            <div class="flex items-center space-x-4">
                <input type="text" 
                       name="main_title" 
                       id="main_title" 
                       value="{{ old('main_title', $content['main_title'] ?? '') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:border-transparent">
                <select name="main_title_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="32" {{ ($content['main_title_font_size'] ?? '32') == '32' ? 'selected' : '' }}>32</option>
                    <option value="36" {{ ($content['main_title_font_size'] ?? '32') == '36' ? 'selected' : '' }}>36</option>
                    <option value="40" {{ ($content['main_title_font_size'] ?? '32') == '40' ? 'selected' : '' }}>40</option>
                    <option value="44" {{ ($content['main_title_font_size'] ?? '32') == '44' ? 'selected' : '' }}>44</option>
                    <option value="48" {{ ($content['main_title_font_size'] ?? '32') == '48' ? 'selected' : '' }}>48</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
            </div>
        </div>

        <!-- Subtitle -->
        <div class="mb-6">
            <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                Sub Judul
            </label>
            <div class="flex items-center space-x-4">
                <textarea name="subtitle" 
                          id="subtitle" 
                          rows="3"
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:border-transparent">{{ old('subtitle', $content['subtitle'] ?? '') }}</textarea>
                <select name="subtitle_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="16" {{ ($content['subtitle_font_size'] ?? '16') == '16' ? 'selected' : '' }}>16</option>
                    <option value="18" {{ ($content['subtitle_font_size'] ?? '16') == '18' ? 'selected' : '' }}>18</option>
                    <option value="20" {{ ($content['subtitle_font_size'] ?? '16') == '20' ? 'selected' : '' }}>20</option>
                    <option value="24" {{ ($content['subtitle_font_size'] ?? '16') == '24' ? 'selected' : '' }}>24</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
            </div>
        </div>

       <div class="mt-6 mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
            <div class="image-upload-area" onclick="document.getElementById('hero-image').click()">
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
            <input type="file" id="hero-image" name="image" accept="image/*" class="hidden">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-cyan-800 text-white rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-offset-2 transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
// Sync color picker with hex input
document.getElementById('bg_color').addEventListener('change', function() {
    document.querySelector('input[name="bg_color_hex"]').value = this.value;
});

document.querySelector('input[name="bg_color_hex"]').addEventListener('input', function() {
    document.getElementById('bg_color').value = this.value;
});
</script>
@endsection