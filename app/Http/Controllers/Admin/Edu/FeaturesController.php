<?php

namespace App\Http\Controllers\Admin\Edu;

use App\Http\Controllers\Controller;
use App\Models\Edu\EduFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    /**
     * Display features list
     */
    public function eduFeatures()
    {
        $features = EduFeature::all();
        return view('admin.edu.features', compact('features'));
    }

    /**
     * Show the form for creating a new feature
     */
    public function createEduFeatures()
    {
        return view('admin.edu.features.create');
    }

    /**
     * Store a newly created feature
     */
    public function storeEduFeature(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('edu/features', 'public');
        }

        EduFeature::create([
            'nama' => $request->nama,
            'gambar' => $imagePath,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('features')
                         ->with('success', 'Feature created successfully!');
    }

    /**
     * Show the form for editing a feature
     */
    public function editEduFeature($id)
    {
        $feature = EduFeature::findOrFail($id);
        return view('admin.edu.features.edit', compact('feature'));
    }

    /**
     * Update a feature
     */
    public function updateEduFeature(Request $request, EduFeature $features)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('gambar')) {
            if ($features->gambar && Storage::disk('public')->exists($features->gambar)) {
                Storage::disk('public')->delete($features->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('edu/features', 'public');
        } else {
            $validated['gambar'] = $features->gambar;
        }

        $features->update($validated);

        return redirect()->route('features')
                         ->with('success', 'Feature updated successfully!');
    }

    /**
     * Delete a feature
     */
    public function deleteEduFeature(EduFeature $features)
    {
        if ($features->gambar && Storage::disk('public')->exists($features->gambar)) {
            Storage::disk('public')->delete($features->gambar);
        }

        $features->delete();

        return redirect()->route('features')
                         ->with('success', 'Feature deleted successfully!');
    }
}
