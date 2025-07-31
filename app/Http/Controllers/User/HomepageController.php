<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Homepage\HomepageHero;

class HomepageController extends Controller
{
    public function index()
    {
        $heroData = HomepageHero::first();
        return view('user.homepage', compact('heroData'));
    }
}
