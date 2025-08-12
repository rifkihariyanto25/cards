<?php

namespace App\Http\Controllers\Admin\HomePage;
use App\Http\Controllers\Controller;
use App\Models\HomePage\HomepageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display products list
     */
    public function homepageProduct()
    {
        $products = HomepageProduct::all();
        return view('admin.homepage.product', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function createHomepageProduct()
    {
        return view('admin.homepage.product.create');
    }

    /**
     * Store a newly created product
     */
public function storeHomepageProduct(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link' => 'nullable|url',
        'deskripsi' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

    // Handle image upload
    $imagePath = null;
    // dd($request->all(), $request->file('gambar'));

    if ($request->hasFile('gambar')) {
        $imagePath = $request->file('gambar')->store('products', 'public');
    }

    HomepageProduct::create([
        'nama' => $request->nama,
        'gambar' => $imagePath,
        'link' => $request->link,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.homepage.product')
                   ->with('success', 'Product created successfully!');
}


    /**
     * Show the form for editing a product
     */
    public function editHomepageProduct($id)
    {
        $product = HomepageProduct::findOrFail($id);
        return view('admin.homepage.product.edit', compact('product'));
    }

    /**
     * Update a product
     */
    public function updateHomepageProduct(Request $request, HomepageProduct $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'deskripsi' => 'nullable|string',

        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama kalau ada
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }

            // Upload gambar baru
            $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        } else {
            // Tetap pakai gambar lama kalau tidak upload baru
            $validated['gambar'] = $product->gambar;
        }

        $product->update($validated);

        return redirect()->route('admin.homepage.product')
                        ->with('success', 'Product updated successfully!');
    }


    /**
     * Delete a product
     */
public function deleteHomepageProduct(HomepageProduct $product)
{
    // Hapus file gambar dari storage
    if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
        Storage::disk('public')->delete($product->gambar);
    }

    $product->delete();

    return redirect()->route('admin.homepage.product')
                     ->with('success', 'Product deleted successfully!');
}

}
