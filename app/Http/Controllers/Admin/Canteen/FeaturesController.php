<?php

namespace App\Http\Controllers\Admin\Canteen;

use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    public function index()
    {
        return view('admin.canteen.features');
    }

    public function update()
    {
        // Tambahkan validasi & penyimpanan jika perlu
        return redirect()->route('admin.canteen.features')->with('success', 'Features section updated successfully');
    }
}
