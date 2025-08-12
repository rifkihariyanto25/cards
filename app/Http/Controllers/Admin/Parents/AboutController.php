<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsAbout;
use Illuminate\Support\Facades\Storage;

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

        $aboutData = ParentsAbout::firstOrNew(['id' => 1]);
        $aboutData->title = $request->title;
        $aboutData->subtitle = $request->subtitle;
        $aboutData->title_font_size = $request->title_font_size;
        $aboutData->subtitle_font_size = $request->subtitle_font_size;


        if ($request->hasFile('cover_image')) {
            if ($aboutData->cover_image && Storage::disk('public')->exists($aboutData->cover_image)) {
                Storage::disk('public')->delete($aboutData->cover_image);
            }
            $aboutData->cover_image = $request->file('cover_image')->store('parents/about', 'public');
        }
        
        $aboutData->save();

        return redirect()->route('admin.parents.about')->with('success', 'About section updated!');
    }
}
