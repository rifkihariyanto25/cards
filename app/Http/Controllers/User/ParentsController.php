<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsHero;
use App\Models\Parents\ParentsAbout;
use App\Models\Parents\ParentsFeature;

class ParentsController extends Controller
{
    public function index()
    {
        $heroData = ParentsHero::first();
        $aboutData = ParentsAbout::first();
        $features = ParentsFeature::where('status', 'active')->get();
        
        return view('user.parents', compact('heroData', 'aboutData', 'features'));
    }
}
