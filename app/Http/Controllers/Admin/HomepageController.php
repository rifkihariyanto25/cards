<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageAbout;
use Illuminate\Http\Request;
use App\Models\HomepageHero;
use Illuminate\Support\Facades\Storage;


class HomepageController extends Controller
{

    public function homepageHero()
    {
        $heroData = HomepageHero::first();

        return view('admin.homepage.hero', compact('heroData'))->with('hero', $heroData);
    }

    public function updateHomepageHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'title_font_size' => 'nullable|string|max:5',
            'subtitle_font_size' => 'nullable|string|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $hero = HomepageHero::firstOrNew(['id' => 1]);

        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->title_font_size = $request->title_font_size;
        $hero->subtitle_font_size = $request->subtitle_font_size;

        if ($request->hasFile('image')) {
            if ($hero->cover_image && Storage::disk('public')->exists($hero->cover_image)) {
                Storage::disk('public')->delete($hero->cover_image);
            }
            $imagePath = $request->file('image')->store('homepage/hero', 'public');
            $hero->cover_image = $imagePath;
        }

        $hero->save();

        return redirect()->route('admin.homepage.hero')->with('success', 'Hero section updated successfully');
    }

    /**
     * Display About Section management page
     */
    public function homepageAbout()
    {
        // Fetch about section data from database
        $aboutData = [
            'title' => 'Sample About Title',
            'content_1' => [
                'title' => 'Content 1 Title',
                'subtitle' => 'Content 1 Subtitle',
                'icon' => null
            ],
            'content_2' => [
                'title' => 'Content 2 Title',
                'subtitle' => 'Content 2 Subtitle',
                'icon' => null
            ]
        ];

        return view('admin.homepage.about', compact('aboutData'));
    }

    /**
     * Update About Section
     */

    public function updateHomepageAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_1_title' => 'required|string|max:255',
            'content_1_subtitle' => 'required|string|max:500',
            'content_1_icon' => 'nullable|file|mimes:svg,png|max:1024',
            'content_2_title' => 'required|string|max:255',
            'content_2_subtitle' => 'required|string|max:500',
            'content_2_icon' => 'nullable|file|mimes:svg,png|max:1024'
        ]);

        $about = HomepageAbout::firstOrNew(['id' => 1]);

        $about->title = $request->title;
        $about->content_1_title = $request->content_1_title;
        $about->content_1_subtitle = $request->content_1_subtitle;
        $about->content_2_title = $request->content_2_title;
        $about->content_2_subtitle = $request->content_2_subtitle;

        // Handle content_1_icon
        if ($request->hasFile('content_1_icon')) {
            // Hapus file lama
            if ($about->content_1_icon && Storage::disk('public')->exists($about->content_1_icon)) {
                Storage::disk('public')->delete($about->content_1_icon);
            }

            // Simpan file baru
            $iconPath1 = $request->file('content_1_icon')->store('homepage/about/icons', 'public');
            $about->content_1_icon = $iconPath1;
        }

        // Handle content_2_icon
        if ($request->hasFile('content_2_icon')) {
            // Hapus file lama
            if ($about->content_2_icon && Storage::disk('public')->exists($about->content_2_icon)) {
                Storage::disk('public')->delete($about->content_2_icon);
            }

            // Simpan file baru
            $iconPath2 = $request->file('content_2_icon')->store('homepage/about/icons', 'public');
            $about->content_2_icon = $iconPath2;
        }

        $about->save();

        return redirect()->route('admin.homepage.about')->with('success', 'About section updated successfully');
    }

    /**
     * Display Mitra Section management page
     */
    public function homepageMitra()
    {
        // Fetch mitra data from database
        $mitraData = [
            ['id' => 1, 'name' => 'SMP Cahaya Quran', 'logo' => 'sample-logo.png'],
            ['id' => 2, 'name' => 'Toyota Alphard', 'logo' => null],
            ['id' => 3, 'name' => 'Daihatsu Ayla', 'logo' => null],
            ['id' => 4, 'name' => 'Toyota Avanza', 'logo' => null],
            ['id' => 5, 'name' => 'Hyundai Palisade', 'logo' => null]
        ];

        return view('admin.homepage.mitra', compact('mitraData'));
    }

    /**
     * Update Mitra Section
     */
    public function updateHomepageMitra(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('homepage/mitra', 'public');
        }

        // Save to database
        // Mitra::create($request->all());

        return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra added successfully');
    }

    /**
     * Delete Mitra
     */
    public function deleteHomepageMitra($id)
    {
        // Delete from database
        // Mitra::findOrFail($id)->delete();

        return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra deleted successfully');
    }

    // Show create form
    public function createHomepageMitra()
    {
        return view('admin.homepage.mitra.create');
    }

    // Store new mitra
    public function storeHomepageMitra(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $logoPath = $request->file('logo')->store('mitra-logos', 'public');


        return redirect()->route('admin.homepage.mitra')->with('success', 'Mitra berhasil ditambahkan!');
    }

    /**
     * Display products list
     */
    public function homepageProduct()
    {
        $products = collect([
            (object) [
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
            'status' => 'required|in:0,1'
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('products', 'public');
        }

        // Here you would typically save to database
        // For now, just redirect with success message

        return redirect()->route('admin.homepage.product')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing a product
     */
    public function editHomepageProduct($id)
    {
        // Mock data - replace with actual database query
        $product = (object) [
            'id' => $id,
            'nama' => 'Cards Edu',
            'gambar' => null,
            'link' => 'https://example.com',
            'deskripsi' => 'Deskripsi produk',
            'status' => 1
        ];

        return view('admin.homepage.product.edit', compact('product'));
    }

    /**
     * Update a product
     */
    public function updateHomepageProduct(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:0,1'
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('products', 'public');
        }

        // Here you would typically update in database

        return redirect()->route('admin.homepage.product')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Delete a product
     */
    public function deleteHomepageProduct($id)
    {
        // Here you would typically delete from database

        return redirect()->route('admin.homepage.product')
            ->with('success', 'Product deleted successfully!');
    }
}
