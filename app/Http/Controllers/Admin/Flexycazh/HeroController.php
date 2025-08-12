<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhHero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $flexycazhHero = FlexycazhHero::first();
        return view('admin.flexycazh.hero', compact('flexycazhHero'))->with('hero', $flexycazhHero);
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

        $hero = FlexycazhHero::firstOrNew(['id' => 1]);
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
            $hero->cover_image = $request->file('image')->store('flexycazh/hero', 'public');
        }

        // Simpan perubahan ke database
        $hero->save();

        return redirect()->route('admin.flexycazh.hero')->with('success', 'Hero section updated successfully');
    }
}
