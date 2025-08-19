<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolHero;
use App\Models\School\SchoolAbout;
use App\Models\School\SchoolFeature;

class SchoolController extends Controller
{
    public function index()
    {
        $heroData = SchoolHero::first();
        $aboutData = SchoolAbout::first();
        $features = SchoolFeature::all();
        
        return view('user.school', compact('heroData', 'aboutData', 'features'));
    }
}
