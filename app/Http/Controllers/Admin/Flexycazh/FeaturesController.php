<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        return view('admin.flexycazh.features');
    }

    public function update(Request $request)
    {
        // Validasi dan logika update
    }
}
