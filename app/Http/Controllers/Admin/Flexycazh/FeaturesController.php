<?php

namespace App\Http\Controllers\Admin\Flexycazh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhFeature;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = FlexycazhFeature::all();
        return view('admin.flexycazh.features', compact('features'));
    }

    public function create()
    {
        return view('admin.flexycazh.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $request->hasFile('gambar') 
            ? $request->file('gambar')->store('flexycazh/features', 'public') 
            : null;

        FlexycazhFeature::create([
            'nama' => $request->nama,
            'gambar' => $imagePath,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.flexycazh.features')
                         ->with('success', 'Feature created successfully!');
    }

    public function edit($id)
    {
        $feature = FlexycazhFeature::findOrFail($id);
        return view('admin.flexycazh.features.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $feature = FlexycazhFeature::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
                Storage::disk('public')->delete($feature->gambar);
            }
            $feature->gambar = $request->file('gambar')->store('flexycazh/features', 'public');
        }

        $feature->update([
            'nama' => $request->nama,
            'gambar' => $feature->gambar,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.flexycazh.features')
                         ->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = FlexycazhFeature::findOrFail($id);

        if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
            Storage::disk('public')->delete($feature->gambar);
        }

        $feature->delete();

        return redirect()->route('admin.flexycazh.features')
                         ->with('success', 'Feature deleted successfully!');
    }
}

