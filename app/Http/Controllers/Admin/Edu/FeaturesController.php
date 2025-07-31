<?php

namespace App\Http\Controllers\Admin\Edu;

use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    public function index()
    {
        return view('admin.edu.features');
    }

    public function update()
    {
        return redirect()->route('admin.edu.features')->with('success', 'Features section updated successfully');
    }
}
