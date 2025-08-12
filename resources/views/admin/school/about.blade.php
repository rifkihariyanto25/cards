@extends('admin.school-conten')

@section('title', 'About Section - School')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">About Section - School</h2>
    </div>

    <form action="{{ route('admin.school.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Section Title -->
        <div class="mb-6">
            <label for="section_title" class="block text-sm font-medium text-gray-700 mb-2">
                Judul Section
            </label>
            <div class="flex items-center space-x-4">
                <input type="text" 
                       name="section_title" 
                       id="section_title" 
                       value="{{ old('section_title', $content['section_title'] ?? '') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2  focus:border-transparent">
                <select name="section_title_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="24" {{ ($content['section_title_font_size'] ?? '28') == '24' ? 'selected' : '' }}>24</option>
                    <option value="28" {{ ($content['section_title_font_size'] ?? '28') == '28' ? 'selected' : '' }}>28</option>
                    <option value="32" {{ ($content['section_title_font_size'] ?? '28') == '32' ? 'selected' : '' }}>32</option>
                    <option value="36" {{ ($content['section_title_font_size'] ?? '28') == '36' ? 'selected' : '' }}>36</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
            </div>
        </div>

        <!-- Section Description -->
        <div class="mb-6">
            <label for="section_description" class="block text-sm font-medium text-gray-700 mb-2">
                Deskripsi Section
            </label>
            <div class="flex items-start space-x-4">
                <textarea name="section_description" 
                          id="section_description" 
                          rows="4"
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2  focus:border-transparent">{{ old('section_description', $content['section_description'] ?? '') }}</textarea>
                <select name="section_description_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="14" {{ ($content['section_description_font_size'] ?? '16') == '14' ? 'selected' : '' }}>14</option>
                    <option value="16" {{ ($content['section_description_font_size'] ?? '16') == '16' ? 'selected' : '' }}>16</option>
                    <option value="18" {{ ($content['section_description_font_size'] ?? '16') == '18' ? 'selected' : '' }}>18</option>
                    <option value="20" {{ ($content['section_description_font_size'] ?? '16') == '20' ? 'selected' : '' }}>20</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
            </div>
        </div>

        <!-- About Image -->
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

        <!-- Layout Position -->
        <div class="mb-6">
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
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-cyan-800 text-white rounded-md hover:bg-cyan-700 focus:ring-2  focus:ring-offset-2 transition-colors">
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