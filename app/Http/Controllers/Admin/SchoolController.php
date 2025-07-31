<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Show school Content Management
     */
    public function schoolHero()
    {
        return view('admin.school.hero');
    }

    /**
     * Update School Content
     */
    public function updateSchoolHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('school/hero', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.school.hero')->with('success', 'Hero section updated successfully');
    }

    public function schoolAbout()
    {
        return view('admin.school.about');
    }

    /**
     * Update About Section
     */
    public function updateSchoolAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('school/about', 'public');
            // Save image path to database
        }

        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());

        return redirect()->route('admin.school.about')->with('success', 'About section updated successfully');
    }

    public function schoolFeatures()
    {
        return view('admin.school.features');
    }

    public function updateSchoolFeatures()
    {
        return redirect()->route('admin.school.features')->with('success', 'Features section updated successfully');
    }

    public function schoolDownload()
    {
        return view('admin.school.download');
    }

    /**
     * Update School Download
     */
    public function updateSchoolDownload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('school/download', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.school.download')->with('success', 'Hero section updated successfully');
    }
}
