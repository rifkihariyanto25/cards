<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        return view('admin.parents.features');
    }

    public function update(Request $request)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'section_title_font_size' => 'required|integer|min:12|max:48',
            'section_description' => 'required|string|max:1000',
            'section_description_font_size' => 'required|integer|min:12|max:24',
            'bg_color' => 'required|string|max:7',
        ]);

        return redirect()->route('admin.parents.features')->with('success', 'Features updated!');
    }
}
