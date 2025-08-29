<?php

namespace App\Http\Controllers\Admin\Edu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edu\EduHero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $eduHero = EduHero::first();
        return view('admin.edu.hero', compact('eduHero'))->with('hero', $eduHero);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'title_font_size' => 'nullable|string|max:5',
            'subtitle_font_size' => 'nullable|string|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $hero = EduHero::firstOrNew(['id' => 1]);

        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->title_font_size = $request->title_font_size;
        $hero->subtitle_font_size = $request->subtitle_font_size;

        if ($request->hasFile('image')) {
            if ($hero->cover_image && Storage::disk('public')->exists($hero->cover_image)) {
                Storage::disk('public')->delete($hero->cover_image);
            }
            $hero->cover_image = $request->file('image')->store('edu/hero', 'public');
        }

        if ($request->remove_image == '1' && $hero->cover_image) {
            if (Storage::disk('public')->exists($hero->cover_image)) {
                Storage::disk('public')->delete($hero->cover_image);
            }
            $hero->cover_image = null;
        }

        $hero->save();

        return redirect()->route('admin.edu.hero')->with('success', 'Hero section updated successfully');
    }
}
