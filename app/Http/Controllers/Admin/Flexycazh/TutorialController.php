<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
      public function index()
    {
        return view('admin.flexycazh.tutorial');
    }

    public function update(Request $request)
    {
        // Validasi dan logika update
    }
}
