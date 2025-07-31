@extends('admin.home-conten')

@section('title', 'Cards Admin - Edit Product')
@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-cards-teal">Product Section - Edit</h2>
        <a href="{{ route('admin.homepage.product') }}" class="btn-back">
            <span class="mr-2">←</span>Kembali
        </a>
    </div>

    <form action="{{ route('admin.homepage.product.update', $product->id) }}" 
      method="POST" 
      enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Nama Produk -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   value="{{ old('nama', $product->nama ?? '') }}"
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
            <div id="upload-area" 
                class="cursor-pointer border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-cards-teal transition"
                onclick="document.getElementById('gambar').click()">

                <!-- Preview -->
                <img id="preview-img" 
                    src="{{ $product->gambar ? asset('storage/' . $product->gambar) : '' }}" 
                    class="{{ $product->gambar ? 'max-h-48 rounded-lg mx-auto mb-2' : 'hidden' }}" 
                    alt="Preview">

                <!-- Placeholder kalau belum ada gambar -->
                <div id="upload-placeholder" class="{{ $product->gambar ? 'hidden' : '' }}">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-gray-600 font-medium">Drop Your File Here or Browse</p>
                </div>
            </div>

            <!-- Hidden input -->
            <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
        </div>


        <!-- Link Produk -->
        <div>
            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link Produk (Optional)</label>
            <input type="url" 
                   id="link" 
                   name="link" 
                   value="{{ old('link', $product->link ?? '') }}"
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
                      placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>
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
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>

            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.homepage.product') }}" class="btn-secondary">Cancel</a>
            <button type="submit" class="btn-primary">Update Product</button>
        </div>
    </form>
</div>

<script>
document.getElementById('gambar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('upload-placeholder').style.display = 'none';
        const img = document.getElementById('preview-img');
        img.src = e.target.result;
        img.classList.remove('hidden');
    }
    reader.readAsDataURL(file);
});
</script>

@endsection