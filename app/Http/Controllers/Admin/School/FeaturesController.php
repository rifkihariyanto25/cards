<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        return view('admin.school.features');
    }

    public function update(Request $request)
    {
        // Tambahkan validasi & logika update jika diperlukan

        return redirect()->route('admin.school.features')->with('success', 'Features section updated successfully');
    }
}
