<?php

namespace App\Http\Controllers\Admin\Canteen;

use App\Http\Controllers\Controller;
use App\Models\Canteen\CanteenFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    /**
     * Display features list
     */
    public function index()
    {
        $features = CanteenFeature::all();
        return view('admin.canteen.features', compact('features'));
    }

    /**
     * Show the form for creating a new feature
     */
    public function create()
    {
        return view('admin.canteen.feature.feature-create');
    }

    /**
     * Store a newly created feature
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('canteen/features', 'public');
        }

        CanteenFeature::create([
            'nama' => $request->nama,
            'gambar' => $imagePath,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.canteen.features')
                         ->with('success', 'Feature created successfully!');
    }

    /**
     * Show the form for editing a feature
     */
    public function edit($id)
    {
        $feature = CanteenFeature::findOrFail($id);
        return view('admin.canteen.feature.feature-edit', compact('feature'));
    }

    /**
     * Update a feature
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $feature = CanteenFeature::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
                Storage::disk('public')->delete($feature->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('canteen/features', 'public');
        } else {
            $validated['gambar'] = $feature->gambar;
        }

        $feature->update($validated);

        return redirect()->route('admin.canteen.features')
                         ->with('success', 'Feature updated successfully!');
    }

    /**
     * Delete a feature
     */
    public function delete($id)
    {
        $feature = CanteenFeature::findOrFail($id);
        
        if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
            Storage::disk('public')->delete($feature->gambar);
        }

        $feature->delete();

        return redirect()->route('admin.canteen.features')
                         ->with('success', 'Feature deleted successfully!');
    }
}
