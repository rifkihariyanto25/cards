<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage\HomepageAbout;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = HomepageAbout::first(); // ambil data pertama
        return view('admin.homepage.about', compact('aboutData'));
    }

    public function update(Request $request)
    {
        $about = HomepageAbout::first() ?? new HomepageAbout();

        // ====== SIMPAN TEXT BIASA ======
        $about->title = $request->title;
        $about->title_font_size = $request->title_font_size;

        // Konten 1
        $about->content_1_title = $request->content_1_title;
        $about->content_1_title_font_size = $request->content_1_title_font_size;
        $about->content_1_subtitle = $request->content_1_subtitle;
        $about->content_1_subtitle_font_size = $request->content_1_subtitle_font_size;

        // Konten 2
        $about->content_2_title = $request->content_2_title;
        $about->content_2_title_font_size = $request->content_2_title_font_size;
        $about->content_2_subtitle = $request->content_2_subtitle;
        $about->content_2_subtitle_font_size = $request->content_2_subtitle_font_size;

        // Konten 3
        $about->content_3_title = $request->content_3_title;
        $about->content_3_title_font_size = $request->content_3_title_font_size;
        $about->content_3_subtitle = $request->content_3_subtitle;
        $about->content_3_subtitle_font_size = $request->content_3_subtitle_font_size;

        // Konten 4
        $about->content_4_title = $request->content_4_title;
        $about->content_4_title_font_size = $request->content_4_title_font_size;
        $about->content_4_subtitle = $request->content_4_subtitle;
        $about->content_4_subtitle_font_size = $request->content_4_subtitle_font_size;


        // ====== SIMPAN ICON ======
        // Icon 1
        if ($request->hasFile('content1_icon')) {
            if ($about->content_1_icon) {
                Storage::disk('public')->delete($about->content_1_icon);
            }
            $about->content_1_icon = $request->file('content1_icon')->store('homepage/about', 'public');
        }

        // Icon 2
        if ($request->hasFile('content2_icon')) {
            if ($about->content_2_icon) {
                Storage::disk('public')->delete($about->content_2_icon);
            }
            $about->content_2_icon = $request->file('content2_icon')->store('homepage/about', 'public');
        }

        // Icon 3
        if ($request->hasFile('content3_icon')) {
            if ($about->content_3_icon) {
                Storage::disk('public')->delete($about->content_3_icon);
            }
            $about->content_3_icon = $request->file('content3_icon')->store('homepage/about', 'public');
        }

        // Icon 4
        if ($request->hasFile('content4_icon')) {
            if ($about->content_4_icon) {
                Storage::disk('public')->delete($about->content_4_icon);
            }
            $about->content_4_icon = $request->file('content4_icon')->store('homepage/about', 'public');
        }

        $about->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }
}
