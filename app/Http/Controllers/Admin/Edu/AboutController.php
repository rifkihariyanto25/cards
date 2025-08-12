<?php

namespace App\Http\Controllers\Admin\Edu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edu\EduAbout;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
     public function index()
    {
        $aboutData = EduAbout::first();
        return view('admin.edu.about', compact('aboutData'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'title_font_size' => 'nullable|string|max:5',
            'subtitle_font_size' => 'nullable|string|max:5',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $aboutData = EduAbout::firstOrNew(['id' => 1]);
        $aboutData->title = $request->title;
        $aboutData->subtitle = $request->subtitle;
        $aboutData->title_font_size = $request->title_font_size;
        $aboutData->subtitle_font_size = $request->subtitle_font_size;

        if ($request->hasFile('cover_image')) {
            if ($aboutData->cover_image && Storage::disk('public')->exists($aboutData->cover_image)) {
                Storage::disk('public')->delete($aboutData->cover_image);
            }
            $aboutData->cover_image = $request->file('cover_image')->store('edu/about', 'public');
        }

        $aboutData->save();

        return redirect()->route('admin.edu.about')->with('success', 'About section updated successfully!');
    }
}
