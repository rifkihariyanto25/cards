<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsHero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $parentsHero = ParentsHero::first();
        return view('admin.parents.hero', compact('parentsHero'))->with('hero', $parentsHero);
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

        $hero = ParentsHero::firstOrNew(['id' => 1]);
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
            $hero->cover_image = $request->file('image')->store('parents/hero', 'public');
        }

        // Simpan perubahan ke database
        $hero->save();

        return redirect()->route('admin.parents.hero')->with('success', 'Hero section updated!');
    }
}
