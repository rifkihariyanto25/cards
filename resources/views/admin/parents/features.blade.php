@extends('admin.parent-conten')

@section('title', 'Features Section - Parents')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Features Section - Parents</h2>
        <a href="{{ route('admin.parents.features.items') }}" 
           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
            Kelola Feature Items
        </a>
    </div>

    <form action="{{ route('admin.parents.features.update') }}" method="POST">
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
                       value="{{ old('section_title', $content['section_title'] ?? 'Orang Tua Gak Risau') }}"
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
                          rows="3"
                          class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('section_description', $content['section_description'] ?? 'Dengan Cards Parents, orang tua dapat memantau aktivitas anak di sekolah dengan mudah dan praktis.') }}</textarea>
                <select name="section_description_font_size" class="px-3 py-2 border border-gray-300 rounded-md bg-white">
                    <option value="14" {{ ($content['section_description_font_size'] ?? '16') == '14' ? 'selected' : '' }}>14</option>
                    <option value="16" {{ ($content['section_description_font_size'] ?? '16') == '16' ? 'selected' : '' }}>16</option>
                    <option value="18" {{ ($content['section_description_font_size'] ?? '16') == '18' ? 'selected' : '' }}>18</option>
                    <option value="20" {{ ($content['section_description_font_size'] ?? '16') == '20' ? 'selected' : '' }}>20</option>
                </select>
                <span class="text-sm text-gray-500">Ukuran Font</span>
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
                       value="{{ old('bg_color', $content['bg_color'] ?? '#ffffff') }}"
                       class="h-10 w-16 rounded border border-gray-300">
                <input type="text" 
                       name="bg_color_hex" 
                       placeholder="#ffffff"
                       value="{{ old('bg_color', $content['bg_color'] ?? '#ffffff') }}"
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
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
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