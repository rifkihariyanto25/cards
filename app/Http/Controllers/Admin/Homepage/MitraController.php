<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Models\Homepage\HomepageMitra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
/**
     * Display mitra list
     */
    public function homepageMitra()
    {
        $mitras = HomepageMitra::all();
        return view('admin.homepage.mitra', compact('mitras'));
    }

    /**
     * Show the form for creating a new mitra
     */
    public function createHomepageMitra()
    {
        return view('admin.homepage.mitra.create');
    }

    /**
     * Store a newly created mitra
     */
    public function storeHomepageMitra(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('mitra-logos', 'public');
        }

        HomepageMitra::create([
            'nama' => $request->nama,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.homepage.mitra')
                        ->with('success', 'Mitra created successfully!');
    }

    /**
     * Show the form for editing a mitra
     */
public function editHomepageMitra($id)
{
    $mitra = HomepageMitra::findOrFail($id);
    return view('admin.homepage.mitra.edit', compact('mitra'));
}

public function updateHomepageMitra(Request $request, HomepageMitra $mitra)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
            Storage::disk('public')->delete($mitra->logo);
        }
        $validated['logo'] = $request->file('logo')->store('mitra-logos', 'public');
    }

    $mitra->update($validated);

    return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra updated successfully!');
}

    /**
     * Delete a mitra
     */
    public function deleteHomepageMitra(HomepageMitra $mitra)
    {
        if ($mitra->logo && Storage::disk('public')->exists($mitra->logo)) {
            Storage::disk('public')->delete($mitra->logo);
        }

        $mitra->delete();

        return redirect()->route('admin.homepage.mitra')
                         ->with('success', 'Mitra deleted successfully!');
    }
}
