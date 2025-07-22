@extends('admin.parent-conten')

@section('title', 'About Section - Parents')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-cards-teal">About Section - Parents</h2>
    </div>

    <form action="{{ route('admin.parents.about.update') }}" method="POST" enctype="multipart/form-data">
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
                       value="{{ old('section_title', $content['section_title'] ?? 'Apa Itu Cards Parents ?') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('section_description', $content['section_description'] ?? 'Sistem ini menyajikan solusi modern yang menyederhanakan peran orang tua. Dengan menggabungkan berbagai fungsi seperti manajemen keuangan, pemantauan pendidikan, dan juga yang lainnya dalam satu ekosistem yang mudah diakses.') }}</textarea>
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
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Gambar About
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                @if(isset($content['about_image']) && $content['about_image'])
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $content['about_image']) }}" 
                             alt="Current About Image" 
                             class="max-w-full h-auto max-h-48 mx-auto rounded-lg shadow-sm">
                    </div>
                @endif
                <div class="upload-area">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="text-sm text-gray-600">
                        <label for="about_image" class="cursor-pointer">
                            <span class="text-blue-600 hover:text-blue-500">Drop Your File Here or Browse</span>
                            <input type="file" id="about_image" name="about_image" class="sr-only" accept="image/*">
                        </label>
                    </div>
                </div>
            </div>
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

        <!-- Background Color -->
        <div class="mb-6">
            <label for="bg_color" class="block text-sm font-medium text-gray-700 mb-2">
                Warna Background
            </label>
            <div class="flex items-center space-x-4">
                <input type="color" 
                       name="bg_color" 
                       id="bg_color" 
                       value="{{ old('bg_color', $content['bg_color'] ?? '#f8fafc') }}"
                       class="h-10 w-16 rounded border border-gray-300">
                <input type="text" 
                       name="bg_color_hex" 
                       placeholder="#f8fafc"
                       value="{{ old('bg_color', $content['bg_color'] ?? '#f8fafc') }}"
                       class="px-4 py-2 border border-gray-300 rounded-md">
            </div>
        </div>

        <!-- Show/Hide Section -->
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" 
                       {{ ($content['is_active'] ?? true) ? 'checked' : '' }}
                       class="mr-2">
                <span class="text-sm font-medium text-gray-700">Tampilkan Section</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-cyan-800 text-white rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
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