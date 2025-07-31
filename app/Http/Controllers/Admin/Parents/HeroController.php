<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.parents.hero');
    }

    public function update(Request $request)
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save logic here

        return redirect()->route('admin.parents.hero')->with('success', 'Hero section updated!');
    }
}
