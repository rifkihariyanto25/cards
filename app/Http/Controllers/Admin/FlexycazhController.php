<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlexycazhController extends Controller
{
    /**
     * Show flexycazh Menu Management
     */
    public function flexycazhHero()
    {
        return view('admin.flexycazh.hero');
    }

    public function updateFlexycazhHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('flexycazh/hero', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.flexycazh.hero')->with('success', 'Hero section updated successfully');
    }

    /**
     * Upload image via AJAX
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'section' => 'required|string|in:hero,about,download',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file format or size too large.'
            ], 400);
        }

        $section = $request->input('section');
        $image = $request->file('image');

        $path = $image->store("edu/{$section}", 'public');

        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully!',
            'path' => $path,
            'url' => asset('storage/' . $path)
        ]);
    }
}
