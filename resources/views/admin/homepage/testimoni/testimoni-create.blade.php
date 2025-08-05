@extends('admin.home-conten')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-cards-teal">Testimoni Section</h2>
        <a href="{{ route('admin.homepage.testimoni') }}" 
           class="bg-cyan-700 hover:bg-cyan-800 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.homepage.testimoni.create') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Nama Field -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input type="text" 
                   id="nama" 
                   name="nama" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                   placeholder="Masukkan nama testimoni"
                   required>
            @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Profesi Field -->
        <div>
            <label for="profesi" class="block text-sm font-medium text-gray-700 mb-2">Profesi</label>
            <input type="text" 
                   id="profesi" 
                   name="profesi" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                   placeholder="Masukkan profesi"
                   required>
            @error('profesi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto Field -->
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors">
                <input type="file" 
                       id="foto" 
                       name="foto" 
                       accept="image/*"
                       class="hidden"
                       onchange="previewImage(this)">
                <label for="foto" class="cursor-pointer">
                    <div id="upload-area">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mt-2 text-sm text-gray-600">
                            <span class="font-medium text-black-600 hover:text-blue-500">Drop Your File Here or Browse</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG up to 2MB</p>
                    </div>
                    <div id="preview-area" class="hidden">
                        <img id="preview-image" src="" alt="Preview" class="mx-auto max-h-48 rounded-lg">
                        <p class="mt-2 text-sm text-gray-600">Click to change image</p>
                    </div>
                </label>
            </div>
            @error('foto')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Komentar Field -->
        <div>
            <label for="komentar" class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
            <textarea id="komentar" 
                      name="komentar" 
                      rows="4"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors resize-vertical"
                      placeholder="Masukkan komentar testimoni"
                      required></textarea>
            @error('komentar')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-2 rounded-lg transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Save
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
    const uploadArea = document.getElementById('upload-area');
    const previewArea = document.getElementById('preview-area');
    const previewImage = document.getElementById('preview-image');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            uploadArea.classList.add('hidden');
            previewArea.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Reset preview when clicking on preview area
document.getElementById('preview-area').addEventListener('click', function() {
    document.getElementById('foto').click();
});
</script>
@endpush
@endsection