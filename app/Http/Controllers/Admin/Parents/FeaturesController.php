<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsFeatures;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = ParentsFeatures::all();
        return view('admin.parents.features', compact('features'));
    }

    public function create()
    {
        return view('admin.parents.features.features-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            // Option 1: Using storeAs method (recommended)
            $path = $gambar->storeAs('parents/features', $gambarName, 'public');
            $data['gambar'] = $path;

            // Option 2: Alternative using move method (uncomment if needed)
            // $destinationPath = storage_path('app/public/parents/features');
            // if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 0755, true);
            // }
            // $gambar->move($destinationPath, $gambarName);
            // $data['gambar'] = 'parents/features/' . $gambarName;
        }

        ParentsFeatures::create($data);

        return redirect()->route('admin.parents.features')->with('success', 'Feature created successfully!');
    }

    public function edit($id)
    {
        $feature = ParentsFeatures::findOrFail($id);
        return view('admin.parents.features.features-edit', compact('features'));
    }

    public function update(Request $request, $id)
    {
        $feature = ParentsFeatures::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
                Storage::disk('public')->delete($feature->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            // Store new image
            $path = $gambar->storeAs('parents/features', $gambarName, 'public');
            $data['gambar'] = $path;
        } else {
            // Remove gambar from data if no new file uploaded
            unset($data['gambar']);
        }

        $feature->update($data);

        return redirect()->route('admin.parents.features')->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = ParentsFeatures::findOrFail($id);

        // Delete image if exists
        if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
            Storage::disk('public')->delete($feature->gambar);
        }

        $feature->delete();

        return redirect()->route('admin.parents.features')->with('success', 'Feature deleted successfully!');
    }
}
