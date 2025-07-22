@extends('admin.home-conten')

@section('title', 'Edit Mitra - Homepage Content Management')

@section('page-title', 'Home Page - Content Management')

@section('content')
<div class="section-card p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-cards-teal">Mitra Section</h2>
        <a href="{{ route('admin.homepage.mitra') }}" class="btn-back">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.homepage.mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Nama Mitra -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Mitra</label>
            <input type="text" id="name" name="name" class="input-field" 
                   value="{{ old('name') ?? $mitra->name }}" 
                   placeholder="Masukkan nama mitra" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Logo Mitra -->
        <div class="mb-6">
            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo Mitra</label>
            <div class="image-upload-area" onclick="document.getElementById('logo').click()">
                <div class="text-center" id="logo-preview">
                    @if($mitra->logo)
                        <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Current Logo" class="max-w-full max-h-32 rounded-lg mb-2">
                        <p class="text-gray-500 text-sm">Click to change logo</p>
                    @else
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="text-gray-500">Drop Your File Here or Browse</p>
                    @endif
                </div>
            </div>
            <input type="file" id="logo" name="logo" class="hidden" accept="image/*">
            @error('logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="flex justify-start">
            <button type="submit" class="btn-primary">
                Save
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logo-preview');
    
    logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                logoPreview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="max-w-full max-h-32 rounded-lg">`;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection