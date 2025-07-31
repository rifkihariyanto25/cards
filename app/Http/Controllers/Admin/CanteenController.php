<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CanteenController extends Controller
{
    /**
     * Show Canteen Menu Management
     */
    public function canteenHero()
    {
        return view('admin.canteen.hero');
    }

    public function updateCanteenHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('canteen/hero', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.canteen.hero')->with('success', 'Hero section updated successfully');
    }

    public function canteenAbout()
    {
        return view('admin.Canteen.about');
    }

    /**
     * Update About Section
     */
    public function updateCanteenAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('canteen/hero', 'public');
            // Save image path to database
        }

        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());

        return redirect()->route('admin.canteen.about')->with('success', 'About section updated successfully');
    }

    public function canteenFeatures()
    {
        return view('admin.canteen.features');
    }

    public function updateCanteenFeatures()
    {
        return redirect()->route('admin.canteen.features')->with('success', 'Features section updated successfully');
    }
}
