<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolHero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $schoolHero = SchoolHero::first();
        return view('admin.school.hero', compact('schoolHero'))->with('hero', $schoolHero);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'title_font_size' => 'nullable|string|max:5',
            'subtitle_font_size' => 'nullable|string|max:5',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $hero = SchoolHero::firstOrNew(['id' => 1]);
        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->title_font_size = $request->title_font_size;
        $hero->subtitle_font_size = $request->subtitle_font_size;

        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($hero->cover_image && Storage::disk('public')->exists($hero->cover_image)) {
                Storage::disk('public')->delete($hero->cover_image);
            }
            // Simpan file baru
            $hero->cover_image = $request->file('image')->store('school/hero', 'public');
        }

        // Simpan perubahan ke database
        $hero->save();

        return redirect()->route('admin.school.hero')->with('success', 'Hero section updated successfully');
    }
}
