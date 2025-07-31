<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.flexycazh.hero');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('flexycazh/hero', 'public');
            // Simpan path ke database kalau ada model
        }

        return redirect()->route('admin.flexycazh.hero')->with('success', 'Hero section updated successfully');
    }
}
