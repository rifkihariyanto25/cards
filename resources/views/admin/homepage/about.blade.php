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

        <!-- Konten-1 -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-1</h3>
            
            <!-- Judul Konten 1 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content1_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content1_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content1_title_font_size') ?? $aboutData->content1_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content1_title_font_size') ?? $aboutData->content1_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content1_title_font_size') ?? $aboutData->content1_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content1_title_font_size') ?? $aboutData->content1_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content1_title" name="content1_title" class="input-field" 
                       value="{{ old('content1_title') ?? $aboutData->content1_title ?? '' }}" 
                       placeholder="Masukkan judul konten 1">
            </div>

            <!-- Sub Judul Konten 1 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content1_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content1_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content1_subtitle_font_size') ?? $aboutData->content1_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content1_subtitle_font_size') ?? $aboutData->content1_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content1_subtitle_font_size') ?? $aboutData->content1_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content1_subtitle_font_size') ?? $aboutData->content1_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content1_subtitle" name="content1_subtitle" class="input-field" 
                       value="{{ old('content1_subtitle') ?? $aboutData->content1_subtitle ?? '' }}" 
                       placeholder="Masukkan sub judul konten 1">
            </div>

            <!-- Link Icon Konten 1 -->
            <div class="mb-4">
                <label for="content1_icon" class="block text-sm font-medium text-gray-700 mb-2">Link Icon</label>
                <div class="image-upload-area" onclick="document.getElementById('content1_icon').click()">
                    @if(isset($aboutData->content1_icon) && $aboutData->content1_icon)
                        <img src="{{ asset('storage/' . $aboutData->content1_icon) }}" alt="Icon" class="max-w-full max-h-32 rounded-lg mb-2">
                    @endif
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan File berbentuk SVG atau PNG</p>
                    </div>
                </div>
                <input type="file" id="content1_icon" name="content1_icon" class="hidden" accept=".svg,.png">
                <button type="button" class="btn-primary mt-2" onclick="document.getElementById('content1_icon').click()">
                    Upload
                </button>
            </div>
        </div>

        <!-- Konten-2 -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konten-2</h3>
            
            <!-- Judul Konten 2 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content2_title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content2_title_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content2_title_font_size') ?? $aboutData->content2_title_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content2_title_font_size') ?? $aboutData->content2_title_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content2_title_font_size') ?? $aboutData->content2_title_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content2_title_font_size') ?? $aboutData->content2_title_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content2_title" name="content2_title" class="input-field" 
                       value="{{ old('content2_title') ?? $aboutData->content2_title ?? '' }}" 
                       placeholder="Masukkan judul konten 2">
            </div>

            <!-- Sub Judul Konten 2 -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="content2_subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Ukuran Font</span>
                        <select name="content2_subtitle_font_size" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                            <option value="36" {{ (old('content2_subtitle_font_size') ?? $aboutData->content2_subtitle_font_size ?? '36') == '36' ? 'selected' : '' }}>36</option>
                            <option value="32" {{ (old('content2_subtitle_font_size') ?? $aboutData->content2_subtitle_font_size ?? '36') == '32' ? 'selected' : '' }}>32</option>
                            <option value="28" {{ (old('content2_subtitle_font_size') ?? $aboutData->content2_subtitle_font_size ?? '36') == '28' ? 'selected' : '' }}>28</option>
                            <option value="24" {{ (old('content2_subtitle_font_size') ?? $aboutData->content2_subtitle_font_size ?? '36') == '24' ? 'selected' : '' }}>24</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="content2_subtitle" name="content2_subtitle" class="input-field" 
                       value="{{ old('content2_subtitle') ?? $aboutData->content2_subtitle ?? '' }}" 
                       placeholder="Masukkan sub judul konten 2">
            </div>

            <!-- Link Icon Konten 2 -->
            <div class="mb-4">
                <label for="content2_icon" class="block text-sm font-medium text-gray-700 mb-2">Link Icon</label>
                <div class="image-upload-area" onclick="document.getElementById('content2_icon').click()">
                    @if(isset($aboutData->content2_icon) && $aboutData->content2_icon)
                        <img src="{{ asset('storage/' . $aboutData->content2_icon) }}" alt="Icon" class="max-w-full max-h-32 rounded-lg mb-2">
                    @endif
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Pastikan File berbentuk SVG atau PNG</p>
                    </div>
                </div>
                <input type="file" id="content2_icon" name="content2_icon" class="hidden" accept=".svg,.png">
                <button type="button" class="btn-primary mt-2" onclick="document.getElementById('content2_icon').click()">
                    Upload
                </button>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-start">
            <button type="submit" class="btn-primary">
                Save
            </button>
        </div>
    </form>
</div>
@endsection