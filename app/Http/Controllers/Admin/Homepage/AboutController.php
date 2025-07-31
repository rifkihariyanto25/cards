<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageAbout;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = HomepageAbout::first();
        return view('admin.homepage.about', compact('aboutData'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_1_title' => 'required|string|max:255',
            'content_1_subtitle' => 'required|string|max:500',
            'content_1_icon' => 'nullable|file|mimes:svg,png|max:1024',
            'content_2_title' => 'required|string|max:255',
            'content_2_subtitle' => 'required|string|max:500',
            'content_2_icon' => 'nullable|file|mimes:svg,png|max:1024'
        ]);

        $about = HomepageAbout::firstOrNew(['id' => 1]);

        $about->title = $request->title;
        $about->content_1_title = $request->content_1_title;
        $about->content_1_subtitle = $request->content_1_subtitle;
        $about->content_2_title = $request->content_2_title;
        $about->content_2_subtitle = $request->content_2_subtitle;

        if ($request->hasFile('content_1_icon')) {
            if ($about->content_1_icon && Storage::disk('public')->exists($about->content_1_icon)) {
                Storage::disk('public')->delete($about->content_1_icon);
            }
            $about->content_1_icon = $request->file('content_1_icon')->store('homepage/about/icons', 'public');
        }

        if ($request->hasFile('content_2_icon')) {
            if ($about->content_2_icon && Storage::disk('public')->exists($about->content_2_icon)) {
                Storage::disk('public')->delete($about->content_2_icon);
            }
            $about->content_2_icon = $request->file('content_2_icon')->store('homepage/about/icons', 'public');
        }

        $about->save();

        return redirect()->route('admin.homepage.about')->with('success', 'About section updated successfully');
    }
}
