<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect([
            (object)[
                'id' => 1,
                'nama' => 'Cards Edu',
                'gambar' => null,
                'link' => 'https://example.com',
                'deskripsi' => 'Deskripsi produk',
                'status' => 1
            ]
        ]);

        return view('admin.homepage.product', compact('products'));
    }

    public function create()
    {
        return view('admin.homepage.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:0,1'
        ]);

        // Store logic here...

        return redirect()->route('admin.homepage.product')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = (object)[
            'id' => $id,
            'nama' => 'Cards Edu',
            'gambar' => null,
            'link' => 'https://example.com',
            'deskripsi' => 'Deskripsi produk',
            'status' => 1
        ];

        return view('admin.homepage.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:0,1'
        ]);

        // Update logic here...

        return redirect()->route('admin.homepage.product')->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        // Delete logic here...

        return redirect()->route('admin.homepage.product')->with('success', 'Product deleted successfully!');
    }
}
