<?php

namespace App\Http\Controllers\Admin\Edu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.edu.hero');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/hero', 'public');
            // Save image path to DB
        }

        return redirect()->route('admin.edu.hero')->with('success', 'Hero section updated successfully');
    }
}
