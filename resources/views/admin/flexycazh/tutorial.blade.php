@extends('admin.flexycazh-conten')

@section('title', 'Flexycazh Testimoni - Cards Admin')
@section('page-title', 'Flexycazh Page - Content Management')

@section('content')
<div class="section-card p-6">
    <h2 class="text-xl font-semibold text-cards-teal mb-6">Tutorial Section</h2>
    
    <form action="{{ route('admin.flexycazh.tutorial.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Judul -->
        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Ukuran Font</span>
                    <select name="title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                        <option value="36" {{ (old('title_font_size') ?? $tutorialData->title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                        <option value="32" {{ (old('title_font_size') ?? $tutorialData->title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                        <option value="28" {{ (old('title_font_size') ?? $tutorialData->title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                        <option value="24" {{ (old('title_font_size') ?? $tutorialData->title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                    </select>
                </div>
            </div>
            <input type="text" id="title" name="title" class="input-field" 
                   value="{{ old('title') ?? $tutorialData->title ?? '' }}" 
                   placeholder="Masukkan judul section">
        </div>

        <!-- ======================= KONTEN 1 ======================= -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-1</h3>

            <!-- Judul Konten 1 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_1_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_1_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_1_title_font_size') ?? $tutorialData->content_1_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_1_title_font_size') ?? $tutorialData->content_1_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_1_title_font_size') ?? $tutorialData->content_1_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_1_title_font_size') ?? $tutorialData->content_1_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_1_title" name="content_1_title" class="input-field" 
                    value="{{ old('content_1_title') ?? $tutorialData->content_1_title ?? '' }}" 
                    placeholder="Masukkan judul konten 1">
            </div>

            <!-- Sub Judul Konten 1 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_1_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_1_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_1_subtitle_font_size') ?? $tutorialData->content_1_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_1_subtitle_font_size') ?? $tutorialData->content_1_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_1_subtitle_font_size') ?? $tutorialData->content_1_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_1_subtitle_font_size') ?? $tutorialData->content_1_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_1_subtitle" name="content_1_subtitle" class="input-field" 
                    value="{{ old('content_1_subtitle') ?? $tutorialData->content_1_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 1">
            </div>
        </div>

        <!-- ======================= KONTEN 2 ======================= -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-2</h3>

            <!-- Judul Konten 2 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_2_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_2_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_2_title_font_size') ?? $tutorialData->content_2_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_2_title_font_size') ?? $tutorialData->content_2_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_2_title_font_size') ?? $tutorialData->content_2_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_2_title_font_size') ?? $tutorialData->content_2_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_2_title" name="content_2_title" class="input-field" 
                    value="{{ old('content_2_title') ?? $tutorialData->content_2_title ?? '' }}" 
                    placeholder="Masukkan judul konten 2">
            </div>

            <!-- Sub Judul Konten 2 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_2_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_2_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_2_subtitle_font_size') ?? $tutorialData->content_2_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_2_subtitle_font_size') ?? $tutorialData->content_2_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_2_subtitle_font_size') ?? $tutorialData->content_2_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_2_subtitle_font_size') ?? $tutorialData->content_2_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_2_subtitle" name="content_2_subtitle" class="input-field" 
                    value="{{ old('content_2_subtitle') ?? $tutorialData->content_2_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 2">
            </div>
        </div>

        <!-- ======================= KONTEN 3 ======================= -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-3</h3>

            <!-- Judul Konten 3 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_3_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_3_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_3_title_font_size') ?? $tutorialData->content_3_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_3_title_font_size') ?? $tutorialData->content_3_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_3_title_font_size') ?? $tutorialData->content_3_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_3_title_font_size') ?? $tutorialData->content_3_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_3_title" name="content_3_title" class="input-field" 
                    value="{{ old('content_3_title') ?? $tutorialData->content_3_title ?? '' }}" 
                    placeholder="Masukkan judul konten 3">
            </div>

            <!-- Sub Judul Konten 3 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_3_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_3_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_3_subtitle_font_size') ?? $tutorialData->content_3_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_3_subtitle_font_size') ?? $tutorialData->content_3_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_3_subtitle_font_size') ?? $tutorialData->content_3_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_3_subtitle_font_size') ?? $tutorialData->content_3_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_3_subtitle" name="content_3_subtitle" class="input-field" 
                    value="{{ old('content_3_subtitle') ?? $tutorialData->content_3_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 3">
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-start mt-6">
            <button type="submit" class="btn-primary">
                Save
            </button>
        </div>
    </form>
</div>
@endsection

<script>
function previewImage(event, previewId) {
    let reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById(previewId).innerHTML =
            `<img src="${e.target.result}" class="mx-auto max-h-32 rounded-lg" alt="Preview">`;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>