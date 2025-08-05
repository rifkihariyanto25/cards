@extends('admin.home-conten')

@section('title', 'About Section - Homepage Content Management')

@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <h2 class="text-xl font-semibold text-cards-teal mb-6">About Section</h2>
    
    <form action="{{ route('admin.homepage.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Judul -->
        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Ukuran Font</span>
                    <select name="title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                        <option value="36" {{ (old('title_font_size') ?? $aboutData->title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                        <option value="32" {{ (old('title_font_size') ?? $aboutData->title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                        <option value="28" {{ (old('title_font_size') ?? $aboutData->title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                        <option value="24" {{ (old('title_font_size') ?? $aboutData->title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                    </select>
                </div>
            </div>
            <input type="text" id="title" name="title" class="input-field" 
                   value="{{ old('title') ?? $aboutData->title ?? '' }}" 
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
                            <option value="36" {{ (old('content_1_title_font_size') ?? $aboutData->content_1_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_1_title_font_size') ?? $aboutData->content_1_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_1_title_font_size') ?? $aboutData->content_1_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_1_title_font_size') ?? $aboutData->content_1_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_1_title" name="content_1_title" class="input-field" 
                    value="{{ old('content_1_title') ?? $aboutData->content_1_title ?? '' }}" 
                    placeholder="Masukkan judul konten 1">
            </div>

            <!-- Sub Judul Konten 1 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_1_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_1_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_1_subtitle_font_size') ?? $aboutData->content_1_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_1_subtitle_font_size') ?? $aboutData->content_1_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_1_subtitle_font_size') ?? $aboutData->content_1_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_1_subtitle_font_size') ?? $aboutData->content_1_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_1_subtitle" name="content_1_subtitle" class="input-field" 
                    value="{{ old('content_1_subtitle') ?? $aboutData->content_1_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 1">
            </div>

            <!-- Icon Konten 1 -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Konten 1</label>
                <div id="preview_content1_icon" 
                     class="image-upload-area cursor-pointer border-dashed border-2 border-gray-300 rounded-lg p-4 text-center"
                     onclick="document.getElementById('content1_icon').click()">
                    @if(isset($aboutData->content_1_icon))
                        <img src="{{ asset('storage/' . $aboutData->content_1_icon) }}" class="mx-auto max-h-32 rounded-lg">
                    @else
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan file berbentuk SVG atau PNG</p>
                    @endif
                </div>
                <input type="file" id="content1_icon" name="content1_icon" class="hidden" accept=".svg,.png"
                    onchange="previewImage(event, 'preview_content1_icon')">
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
                            <option value="36" {{ (old('content_2_title_font_size') ?? $aboutData->content_2_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_2_title_font_size') ?? $aboutData->content_2_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_2_title_font_size') ?? $aboutData->content_2_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_2_title_font_size') ?? $aboutData->content_2_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_2_title" name="content_2_title" class="input-field" 
                    value="{{ old('content_2_title') ?? $aboutData->content_2_title ?? '' }}" 
                    placeholder="Masukkan judul konten 2">
            </div>

            <!-- Sub Judul Konten 2 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_2_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_2_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_2_subtitle_font_size') ?? $aboutData->content_2_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_2_subtitle_font_size') ?? $aboutData->content_2_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_2_subtitle_font_size') ?? $aboutData->content_2_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_2_subtitle_font_size') ?? $aboutData->content_2_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_2_subtitle" name="content_2_subtitle" class="input-field" 
                    value="{{ old('content_2_subtitle') ?? $aboutData->content_2_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 2">
            </div>

            <!-- Icon Konten 2 -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Konten 2</label>
                <div id="preview_content2_icon" 
                     class="image-upload-area cursor-pointer border-dashed border-2 border-gray-300 rounded-lg p-4 text-center"
                     onclick="document.getElementById('content2_icon').click()">
                    @if(isset($aboutData->content_2_icon))
                        <img src="{{ asset('storage/' . $aboutData->content_2_icon) }}" class="mx-auto max-h-32 rounded-lg">
                    @else
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan file berbentuk SVG atau PNG</p>
                    @endif
                </div>
                <input type="file" id="content2_icon" name="content2_icon" class="hidden" accept=".svg,.png"
                    onchange="previewImage(event, 'preview_content2_icon')">
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
                            <option value="36" {{ (old('content_3_title_font_size') ?? $aboutData->content_3_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_3_title_font_size') ?? $aboutData->content_3_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_3_title_font_size') ?? $aboutData->content_3_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_3_title_font_size') ?? $aboutData->content_3_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_3_title" name="content_3_title" class="input-field" 
                    value="{{ old('content_3_title') ?? $aboutData->content_3_title ?? '' }}" 
                    placeholder="Masukkan judul konten 3">
            </div>

            <!-- Sub Judul Konten 3 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_3_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_3_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_3_subtitle_font_size') ?? $aboutData->content_3_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_3_subtitle_font_size') ?? $aboutData->content_3_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_3_subtitle_font_size') ?? $aboutData->content_3_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_3_subtitle_font_size') ?? $aboutData->content_3_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_3_subtitle" name="content_3_subtitle" class="input-field" 
                    value="{{ old('content_3_subtitle') ?? $aboutData->content_3_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 3">
            </div>

            <!-- Icon Konten 3 -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Konten 3</label>
                <div id="preview_content3_icon" 
                     class="image-upload-area cursor-pointer border-dashed border-2 border-gray-300 rounded-lg p-4 text-center"
                     onclick="document.getElementById('content3_icon').click()">
                    @if(isset($aboutData->content_3_icon))
                        <img src="{{ asset('storage/' . $aboutData->content_3_icon) }}" class="mx-auto max-h-32 rounded-lg">
                    @else
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan file berbentuk SVG atau PNG</p>
                    @endif
                </div>
                <input type="file" id="content3_icon" name="content3_icon" class="hidden" accept=".svg,.png"
                    onchange="previewImage(event, 'preview_content3_icon')">
            </div>
        </div>

        <!-- ======================= KONTEN 4 ======================= -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-4</h3>

            <!-- Judul Konten 4 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_4_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_4_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_4_title_font_size') ?? $aboutData->content_4_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_4_title_font_size') ?? $aboutData->content_4_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_4_title_font_size') ?? $aboutData->content_4_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_4_title_font_size') ?? $aboutData->content_4_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_4_title" name="content_4_title" class="input-field" 
                    value="{{ old('content_4_title') ?? $aboutData->content_4_title ?? '' }}" 
                    placeholder="Masukkan judul konten 4">
            </div>

            <!-- Sub Judul Konten 4 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content_4_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content_4_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content_4_subtitle_font_size') ?? $aboutData->content_4_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content_4_subtitle_font_size') ?? $aboutData->content_4_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content_4_subtitle_font_size') ?? $aboutData->content_4_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content_4_subtitle_font_size') ?? $aboutData->content_4_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content_4_subtitle" name="content_4_subtitle" class="input-field" 
                    value="{{ old('content_4_subtitle') ?? $aboutData->content_4_subtitle ?? '' }}" 
                    placeholder="Masukkan sub judul konten 4">
            </div>

            <!-- Icon Konten 4 -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Icon Konten 4</label>
                <div id="preview_content4_icon" 
                     class="image-upload-area cursor-pointer border-dashed border-2 border-gray-300 rounded-lg p-4 text-center"
                     onclick="document.getElementById('content4_icon').click()">
                    @if(isset($aboutData->content_4_icon))
                        <img src="{{ asset('storage/' . $aboutData->content_4_icon) }}" class="mx-auto max-h-32 rounded-lg">
                    @else
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan file berbentuk SVG atau PNG</p>
                    @endif
                </div>
                <input type="file" id="content4_icon" name="content4_icon" class="hidden" accept=".svg,.png"
                    onchange="previewImage(event, 'preview_content4_icon')">
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
