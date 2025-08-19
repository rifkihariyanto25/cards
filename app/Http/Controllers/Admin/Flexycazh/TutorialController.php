<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhTutorial;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorialData = FlexycazhTutorial::first(); // ambil data pertama
        return view('admin.flexycazh.tutorial', compact('tutorialData'));
    }

    public function update(Request $request)
    {
        $about = FlexycazhTutorial::first() ?? new FlexycazhTutorial();

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

        $about->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }
}
