@extends('admin.home-conten')

@section('title', 'Cards Admin - Add Product')
@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-cards-teal">Product Section</h2>
        <a href="{{ route('admin.homepage.product') }}" class="btn-back">
            <span class="mr-2">←</span>Kembali
        </a>
    </div>

    <form action="{{ route('admin.homepage.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Nama Produk -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   value="{{ old('nama') }}"
                   class="input-field @error('nama') border-red-500 @enderror" 
                   placeholder="Masukkan nama produk"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar Produk -->
        <div>
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar Produk</label>
            <div class="image-upload-area" onclick="document.getElementById('gambar').click()">
                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                <p class="text-gray-600 font-medium mb-2">Drop Your File Here or Browse</p>
                <p class="text-gray-500 text-sm">Supports: JPG, PNG, GIF (Max: 2MB)</p>
                <input type="file" 
                       id="gambar" 
                       name="gambar" 
                       accept="image/*" 
                       class="hidden"
                       onchange="previewImage(this)">
            </div>
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Link Produk -->
        <div>
            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link Produk (Optional)</label>
            <input type="url" 
                   id="link" 
                   name="link" 
                   value="{{ old('link') }}"
                   class="input-field @error('link') border-red-500 @enderror" 
                   placeholder="https://example.com">
            @error('link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Produk -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Produk (Optional)</label>
            <textarea id="deskripsi" 
                      name="deskripsi" 
                      class="textarea-field @error('deskripsi') border-red-500 @enderror" 
                      placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="status" 
                    name="status" 
                    class="input-field @error('status') border-red-500 @enderror">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.homepage.product') }}" class="btn-secondary">Cancel</a>
            <button type="submit" class="btn-primary">Save Product</button>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const file = input.files[0];
    const uploadArea = input.closest('.image-upload-area');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            uploadArea.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="max-w-full max-h-48 rounded-lg mx-auto">
                <p class="text-sm text-gray-600 mt-2">Click to change image</p>
            `;
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection