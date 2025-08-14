<?php

namespace App\Http\Controllers\Admin\Parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parents\ParentsFeature;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = ParentsFeature::all();
        return view('admin.parents.features', compact('features'));
    }

    public function create()
    {
        return view('admin.parents.feature.feature-create');
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
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/parents/features', $gambarName);
            $data['gambar'] = 'parents/features/' . $gambarName;
        }

        ParentsFeature::create($data);

        return redirect()->route('admin.parents.features')->with('success', 'Feature created successfully!');
    }

    public function edit($id)
    {
        $feature = ParentsFeature::findOrFail($id);
        return view('admin.parents.feature.feature-edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = ParentsFeature::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($feature->gambar) {
                Storage::delete('public/' . $feature->gambar);
            }
            
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/parents/features', $gambarName);
            $data['gambar'] = 'parents/features/' . $gambarName;
        }

        $feature->update($data);

        return redirect()->route('admin.parents.features')->with('success', 'Feature updated successfully!');
    }

    public function destroy($id)
    {
        $feature = ParentsFeature::findOrFail($id);
        
        // Delete image
        if ($feature->gambar) {
            Storage::delete('public/' . $feature->gambar);
        }
        
        $feature->delete();

        return redirect()->route('admin.parents.features')->with('success', 'Feature deleted successfully!');
    }
    

}
