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

        return redirect()->route('admin.edu.features')
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
    public function updateEduFeature(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $feature = EduFeature::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
                Storage::disk('public')->delete($feature->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('edu/features', 'public');
        } else {
            $validated['gambar'] = $feature->gambar;
        }

        $feature->update($validated);

        return redirect()->route('admin.edu.features')
                         ->with('success', 'Feature updated successfully!');
    }

    /**
     * Delete a feature
     */
    public function deleteEduFeature($id)
    {
        $feature = EduFeature::findOrFail($id);
        
        if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
            Storage::disk('public')->delete($feature->gambar);
        }

        $feature->delete();

        return redirect()->route('admin.edu.features')
                         ->with('success', 'Feature deleted successfully!');
    }
}
