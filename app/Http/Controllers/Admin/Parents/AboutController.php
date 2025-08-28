<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsAbout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = ParentsAbout::first();
        return view('admin.parents.about', compact('aboutData'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'title_font_size' => 'nullable|string|max:5',
            'subtitle_font_size' => 'nullable|string|max:5',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        try {
            $aboutData = ParentsAbout::firstOrNew(['id' => 1]);
            $aboutData->title = $request->title;
            $aboutData->subtitle = $request->subtitle;
            $aboutData->title_font_size = $request->title_font_size ?? 32;
            $aboutData->subtitle_font_size = $request->subtitle_font_size ?? 16;

            // Handle file upload
            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');

                // Validasi tambahan
                if ($file->isValid()) {
                    // Hapus gambar lama jika ada
                    if ($aboutData->cover_image && Storage::disk('public')->exists($aboutData->cover_image)) {
                        Storage::disk('public')->delete($aboutData->cover_image);
                        Log::info('Old image deleted: ' . $aboutData->cover_image);
                    }

                    // Pastikan direktori exists
                    $directory = 'parents/about';
                    if (!Storage::disk('public')->exists($directory)) {
                        Storage::disk('public')->makeDirectory($directory);
                    }

                    // Simpan file dengan nama unik
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs($directory, $fileName, 'public');

                    if ($path) {
                        $aboutData->cover_image = $path;
                        Log::info('New image saved: ' . $path);
                    } else {
                        Log::error('Failed to save image');
                        return redirect()->back()->with('error', 'Gagal menyimpan gambar!');
                    }
                } else {
                    Log::error('Invalid file uploaded');
                    return redirect()->back()->with('error', 'File tidak valid!');
                }
            }

            $aboutData->save();
            Log::info('About data saved successfully');

            return redirect()->route('admin.parents.about')->with('success', 'About section berhasil diupdate!');
        } catch (\Exception $e) {
            Log::error('Error updating about section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
