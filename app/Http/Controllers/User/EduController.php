<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edu\EduHero;
use App\Models\Edu\EduAbout;
use App\Models\Edu\EduFeature;

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
