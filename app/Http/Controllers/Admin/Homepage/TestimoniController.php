<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Models\Homepage\HomepageTestimoni;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
public function homepageTestimoni()
{
    // Jika Anda sudah memiliki model Testimoni, gunakan:
    // $testimonies = Testimoni::orderBy('created_at', 'desc')->get();
    
    // Untuk sementara, return view dengan data dummy
    return view('admin.homepage.testimoni');
}

/**
 * Show create testimoni form
 */
public function createHomepageTestimoni()
{
    return view('admin.homepage.testimoni.testimoni-create');
}

/**
 * Store new testimoni
 */
public function storeHomepageTestimoni(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'profesi' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'komentar' => 'required|string',
    ]);

    try {
        // Handle file upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = $foto->storeAs('testimonies', $filename, 'public');
            $validatedData['foto'] = $path;
        }

        // Jika Anda sudah memiliki model Testimoni:
        // Testimoni::create($validatedData);

        // Flash message sukses
        return redirect()->route('admin.homepage.testimoni')
                         ->with('success', 'Testimoni berhasil ditambahkan!');
                         
    } catch (\Exception $e) {
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Gagal menambahkan testimoni: ' . $e->getMessage());
    }
}

/**
 * Show edit testimoni form
 */
public function editHomepageTestimoni($id)
{
    // Jika Anda sudah memiliki model Testimoni:
    // $testimoni = Testimoni::findOrFail($id);
    
    // Untuk sementara, return view dengan data dummy
    $testimoni = (object) [
        'id' => $id,
        'nama' => 'Ibu Mega',
        'profesi' => 'Kepala Sekolah',
        'foto' => 'testimonies/sample.jpg',
        'komentar' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ];
    
    return view('admin.homepage.testimoni.testimoni-edit', compact('testimoni'));
}

/**
 * Update testimoni
 */
public function updateHomepageTestimoni(Request $request, $id)
{
    // Validasi data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'profesi' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'komentar' => 'required|string',
    ]);

    try {
        // Jika Anda sudah memiliki model Testimoni:
        // $testimoni = Testimoni::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = $foto->storeAs('testimonies', $filename, 'public');
            
            // Hapus foto lama jika ada
            // if ($testimoni->foto && Storage::disk('public')->exists($testimoni->foto)) {
            //     Storage::disk('public')->delete($testimoni->foto);
            // }
            
            $validatedData['foto'] = $path;
        }

        // Update data
        // $testimoni->update($validatedData);

        return redirect()->route('admin.homepage.testimoni')
                         ->with('success', 'Testimoni berhasil diperbarui!');
                         
    } catch (\Exception $e) {
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Gagal memperbarui testimoni: ' . $e->getMessage());
    }
}

/**
 * Delete testimoni
 */
public function deleteHomepageTestimoni($id)
{
    try {
        // Jika Anda sudah memiliki model Testimoni:
        // $testimoni = Testimoni::findOrFail($id);
        
        // Hapus foto jika ada
        // if ($testimoni->foto && Storage::disk('public')->exists($testimoni->foto)) {
        //     Storage::disk('public')->delete($testimoni->foto);
        // }
        
        // $testimoni->delete();

        return redirect()->route('admin.homepage.testimoni')
                         ->with('success', 'Testimoni berhasil dihapus!');
                         
    } catch (\Exception $e) {
        return redirect()->back()
                         ->with('error', 'Gagal menghapus testimoni: ' . $e->getMessage());
    }
}

}
