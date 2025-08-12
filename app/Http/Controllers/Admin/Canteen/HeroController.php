<?php

namespace App\Http\Controllers\Admin\Canteen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canteen\CanteenHero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $canteenHero = CanteenHero::first();
        return view('admin.canteen.hero', compact('canteenHero'))->with('hero', $canteenHero);
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

        $hero = CanteenHero::firstOrNew(['id' => 1]);
        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->title_font_size = $request->title_font_size;
        $hero->subtitle_font_size = $request->subtitle_font_size;

        if ($request->hasFile('image')) {
            if ($hero->cover_image && Storage::disk('public')->exists($hero->cover_image)) {
                Storage::disk('public')->delete($hero->cover_image);
            }
            $hero->cover_image = $request->file('image')->store('canteen/hero', 'public');
        }

        $hero->save();

        return redirect()->route('admin.canteen.hero')->with('success', 'Hero section updated successfully');
    }
}
