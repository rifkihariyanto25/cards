<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canteen\CanteenHero;
use App\Models\Canteen\CanteenAbout;
use App\Models\Canteen\CanteenFeature;

class CanteenController extends Controller
{
    /**
     * Display the canteen page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data hero dan about dari model
        $hero = CanteenHero::first();
        $about = CanteenAbout::first();
        $features = CanteenFeature::where('status', 'active')->get();

        // Mengirim data ke view
        return view('user.canteen', compact('hero', 'about', 'features'));
    }
}
