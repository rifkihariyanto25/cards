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
        $features = FlexycazhFeature::latest()->get();
        return view('admin.flexycazh.features', compact('features'));
    }

    public function create()
    {
        return view('admin.flexycazh.feature.feature-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/flexycazh/features', $gambarName);
            $validated['gambar'] = 'flexycazh/features/' . $gambarName;
        }

        FlexycazhFeature::create($validated);

        return redirect()->route('admin.flexycazh.features.index')->with('success', 'Feature created successfully!');
    }

    public function edit($id)
    {
        $feature = FlexycazhFeature::findOrFail($id);
        return view('admin.flexycazh.feature.feature-edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = FlexycazhFeature::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Jika ada gambar baru, hapus yang lama lalu simpan baru
        if ($request->hasFile('gambar')) {
            if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
                Storage::disk('public')->delete($feature->gambar);
            }

            $gambarName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/flexycazh/features', $gambarName);
            $validated['gambar'] = 'flexycazh/features/' . $gambarName;
        }

        $feature->update($validated);

        return redirect()->route('admin.flexycazh.features.index')->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = FlexycazhFeature::findOrFail($id);

        // Hapus gambar jika ada
        if ($feature->gambar && Storage::disk('public')->exists($feature->gambar)) {
            Storage::disk('public')->delete($feature->gambar);
        }

        $feature->delete();

        return redirect()->route('admin.flexycazh.features.index')->with('success', 'Feature deleted successfully!');
    }
}
