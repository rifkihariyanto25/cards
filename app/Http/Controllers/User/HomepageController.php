<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Homepage\HomepageHero;
use App\Models\Homepage\HomepageMitra;
use App\Models\Homepage\HomepageProduct;
use App\Models\Homepage\HomepageTestimoni;

class HomepageController extends Controller
{
    public function index()
    {
        $heroData = HomepageHero::first();
        $mitras = HomepageMitra::all();
        $products = HomepageProduct::all();
        $testimonies = HomepageTestimoni::all();
        
        return view('user.homepage', compact('heroData', 'mitras', 'products', 'testimonies'));
    }
}
