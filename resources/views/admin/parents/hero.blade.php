@extends('admin.parent-conten')

@section('title', 'Hero Section - Parents')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-cards-teal">Hero Section - Parents</h2>
    </div>

    <form action="{{ route('admin.parents.hero.update') }}" method="POST" enctype="multipart/form-data">
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
                       value="{{ old('main_title', $content['main_title'] ?? 'Cards Parents') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('subtitle', $content['subtitle'] ?? 'Transformasi sekolah jadi digital? Bisa! Dengan Cards Parents, kelola uang saku anak, tagihan sekolah, dan rapor jadi lebih cepat, rapi, dan terpantau!') }}</textarea>
                <select name="subtitle_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="16" {{ ($content['subtitle_font_size'] ?? '16') == '16' ? 'selected' : '' }}>16</option>
                    <option value="18" {{ ($content['subtitle_font_size'] ?? '16') == '18' ? 'selected' : '' }}>18</option>
                    <option value="20" {{ ($content['subtitle_font_size'] ?? '16') == '20' ? 'selected' : '' }}>20</option>
                    <option value="24" {{ ($content['subtitle_font_size'] ?? '16') == '24' ? 'selected' : '' }}>24</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
            </div>
        </div>

        <!-- CTA Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="cta_button_1" class="block text-sm font-medium text-gray-700 mb-2">
                    Tombol CTA 1
                </label>
                <input type="text" 
                       name="cta_button_1" 
                       id="cta_button_1" 
                       value="{{ old('cta_button_1', $content['cta_button_1'] ?? 'Selengkapnya') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="url" 
                       name="cta_button_1_url" 
                       placeholder="URL untuk tombol 1"
                       value="{{ old('cta_button_1_url', $content['cta_button_1_url'] ?? '#') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent mt-2">
            </div>
            <div>
                <label for="cta_button_2" class="block text-sm font-medium text-gray-700 mb-2">
                    Tombol CTA 2
                </label>
                <input type="text" 
                       name="cta_button_2" 
                       id="cta_button_2" 
                       value="{{ old('cta_button_2', $content['cta_button_2'] ?? 'Jadwalkan Demo') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="url" 
                       name="cta_button_2_url" 
                       placeholder="URL untuk tombol 2"
                       value="{{ old('cta_button_2_url', $content['cta_button_2_url'] ?? '#') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent mt-2">
            </div>
        </div>

        <!-- Hero Image -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Gambar Hero
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                @if(isset($content['hero_image']) && $content['hero_image'])
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $content['hero_image']) }}" 
                             alt="Current Hero Image" 
                             class="max-w-full h-auto max-h-48 mx-auto rounded-lg shadow-sm">
                    </div>
                @endif
                <div class="upload-area">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="text-sm text-gray-600">
                        <label for="hero_image" class="cursor-pointer">
                            <span class="text-blue-600 hover:text-blue-500">Drop Your File Here or Browse</span>
                            <input type="file" id="hero_image" name="hero_image" class="sr-only" accept="image/*">
                        </label>
                    </div>
                </div>
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
                       value="{{ old('bg_color', $content['bg_color'] ?? '#0891b2') }}"
                       class="h-10 w-16 rounded border border-gray-300">
                <input type="text" 
                       name="bg_color_hex" 
                       placeholder="#0891b2"
                       value="{{ old('bg_color', $content['bg_color'] ?? '#0891b2') }}"
                       class="px-4 py-2 border border-gray-300 rounded-md">
            </div>
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