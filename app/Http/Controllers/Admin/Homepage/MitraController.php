<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitraData = [
            ['id' => 1, 'name' => 'SMP Cahaya Quran', 'logo' => 'sample-logo.png'],
            ['id' => 2, 'name' => 'Toyota Alphard', 'logo' => null],
            ['id' => 3, 'name' => 'Daihatsu Ayla', 'logo' => null],
            ['id' => 4, 'name' => 'Toyota Avanza', 'logo' => null],
            ['id' => 5, 'name' => 'Hyundai Palisade', 'logo' => null]
        ];
        return view('admin.homepage.mitra', compact('mitraData'));
    }

    public function create()
    {
        return view('admin.homepage.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Store logic here...

        return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra berhasil ditambahkan!');
    }

    public function delete($id)
    {

        return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra deleted successfully');
    }
}
