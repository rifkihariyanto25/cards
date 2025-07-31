<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.parents.about');
    }

    public function update(Request $request)
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save logic here

        return redirect()->route('admin.parents.about')->with('success', 'About section updated!');
    }
}
