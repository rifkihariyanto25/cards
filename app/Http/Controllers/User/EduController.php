<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Edu\EduAbout;
use App\Models\Edu\EduFeature;
use App\Models\Edu\EduHero;
use Illuminate\Http\Request;

class EduController extends Controller
{
    public function index()
    {
        $heroData = EduHero::first();
        $aboutData = EduAbout::first();
        $features = EduFeature::all();

        return view('user.edu', compact('heroData', 'aboutData', 'features'));
    }
}
