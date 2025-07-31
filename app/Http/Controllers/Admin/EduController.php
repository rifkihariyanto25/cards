<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EduController extends Controller
{

    public function eduHero()
    {
        return view('admin.edu.hero');
    }

    /**
     * Update Edu hero
     */
    public function updateEduHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/hero', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.edu.hero')->with('success', 'Hero section updated successfully');
    }

    public function eduAbout()
    {
        return view('admin.edu.about');
    }

    /**
     * Update About Section
     */
    public function updateEduAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/about', 'public');
            // Save image path to database
        }

        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());

        return redirect()->route('admin.edu.about')->with('success', 'About section updated successfully');
    }

    public function eduFeatures()
    {
        return view('admin.edu.features');
    }

    public function updateEduFeatures()
    {
        return redirect()->route('admin.edu.features')->with('success', 'Features section updated successfully');
    }



    /**
     * Update Download Section
     */
    public function eduDownload()
    {
        return view('admin.edu.download');
    }

    /**
     * Update Edu Download
     */
    public function updateEduDownload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/download', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.edu.download')->with('success', 'Hero section updated successfully');
    }
}
