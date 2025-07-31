<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display Parents Hero Section form
     */
    public function parentsHero()
    {
        return view('admin.parents.hero');
    }

    /**
     * Update Parents Hero Section
     */
    public function updateParentsHero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'main_title_font_size' => 'required|in:32,36,40,44,48',
            'subtitle' => 'required|string|max:1000',
            'subtitle_font_size' => 'required|in:16,18,20,24',
            'cta_button_1' => 'required|string|max:100',
            'cta_button_1_url' => 'required|url',
            'cta_button_2' => 'required|string|max:100',
            'cta_button_2_url' => 'required|url',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update content
        $content['main_title'] = $request->input('main_title');
        $content['main_title_font_size'] = $request->input('main_title_font_size');
        $content['subtitle'] = $request->input('subtitle');
        $content['subtitle_font_size'] = $request->input('subtitle_font_size');
        $content['cta_button_1'] = $request->input('cta_button_1');
        $content['cta_button_1_url'] = $request->input('cta_button_1_url');
        $content['cta_button_2'] = $request->input('cta_button_2');
        $content['cta_button_2_url'] = $request->input('cta_button_2_url');
        $content['bg_color'] = $request->input('bg_color');
        $content['is_active'] = true;

        // Save updated content


        return redirect()->route('admin.parents.hero')
            ->with('success', 'Hero section berhasil diperbarui!');
    }

    /**
     * Display Parents About Section form
     */
    public function parentsAbout()
    {

        return view('admin.parents.about');
    }

    /**
     * Update Parents About Section
     */
    public function updateParentsAbout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'section_title_font_size' => 'required|in:24,28,32,36',
            'section_description' => 'required|string|max:1000',
            'section_description_font_size' => 'required|in:14,16,18,20',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'layout_position' => 'required|in:image_left,image_right',
            'bg_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update content
        $content['section_title'] = $request->input('section_title');
        $content['section_title_font_size'] = $request->input('section_title_font_size');
        $content['section_description'] = $request->input('section_description');
        $content['section_description_font_size'] = $request->input('section_description_font_size');
        $content['layout_position'] = $request->input('layout_position');
        $content['bg_color'] = $request->input('bg_color');
        $content['is_active'] = $request->has('is_active') ? true : false;



        return redirect()->route('admin.parents.about')
            ->with('success', 'About section berhasil diperbarui!');
    }

    // Features Section
    public function parentsFeatures()
    {

        return view('admin.parents.features');
    }

    public function updateParentsFeatures(Request $request)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'section_title_font_size' => 'required|integer|min:12|max:48',
            'section_description' => 'required|string|max:1000',
            'section_description_font_size' => 'required|integer|min:12|max:24',
            'bg_color' => 'required|string|max:7',
        ]);

        return redirect()->route('admin.parents.features')->with('success', 'Features section berhasil diperbarui!');
    }

    public function parentsDownload()
    {
        return view('admin.parents.download');
    }

    /**
     * Update Edu Download
     */
    public function updateParentsDownload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('parents/download', 'public');
            // Save image path to database
        }


        return redirect()->route('admin.parents.download')->with('success', 'download section updated successfully');
    }
}
