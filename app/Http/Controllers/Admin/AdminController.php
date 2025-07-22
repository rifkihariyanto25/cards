<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Show the admin login form
     */
    public function showLoginForm()
    {
        // Redirect to dashboard if already authenticated
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Username atau password salah.');
    }

    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }


    // Homepage Management Methods
    
    /**
     * Display Hero Section management page
     */
    public function homepageHero()
    {
        // Fetch hero section data from database
        $heroData = [
            'title' => 'Sample Hero Title',
            'subtitle' => 'Sample Hero Subtitle',
            'cover_image' => null
        ];
        
        return view('admin.homepage.hero', compact('heroData'));
    }
    
    /**
     * Update Hero Section
     */
    public function updateHomepageHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('homepage/hero', 'public');
            // Save image path to database
        }
        
        // Update hero data in database
        // Hero::updateOrCreate(['id' => 1], $request->only(['title', 'subtitle']));
        
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
        
        // Handle file uploads
        if ($request->hasFile('content_1_icon')) {
            $iconPath1 = $request->file('content_1_icon')->store('homepage/about/icons', 'public');
        }
        
        if ($request->hasFile('content_2_icon')) {
            $iconPath2 = $request->file('content_2_icon')->store('homepage/about/icons', 'public');
        }
        
        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());
        
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


    /**
     * Show Edu hero Management
     */
    public function eduHero()
    {
        return view('admin.edu.hero');
    }

    /**
     * Update Edu hero
     */
    public function updateEduHero(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/hero', 'public');
            // Save image path to database
        }
        
        
        return redirect()->route('admin.edu.hero')->with('success', 'Hero section updated successfully');
    }

    public function eduAbout()
    {        
        return view('admin.edu.about');
    }
    
    /**
     * Update About Section
     */
    public function updateEduAbout(Request $request)
    {
        $request->validate([
           'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/about', 'public');
            // Save image path to database
        }
        
        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());
        
        return redirect()->route('admin.edu.about')->with('success', 'About section updated successfully');
    }public function eduFeatures()
    {
        return view('admin.edu.features');
    }


     /**
     * Update Download Section
     */
    public function eduDownload()
    {
        return view('admin.edu.download');
    }

    /**
     * Update Edu Content
     */
    public function updateEduDownload(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('edu/download', 'public');
            // Save image path to database
        }
        
        
        return redirect()->route('admin.edu.download')->with('success', 'Hero section updated successfully');
    }

    /**
     * Show Canteen Menu Management
     */
    public function canteenHero()
    {
        return view('admin.canteen.hero');
    }

     public function updateCanteenHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('canteen/hero', 'public');
            // Save image path to database
        }
        
        
        return redirect()->route('admin.canteen.hero')->with('success', 'Hero section updated successfully');
    }

    public function canteenAbout()
    {        
        return view('admin.Canteen.about');
    }
    
    /**
     * Update About Section
     */
    public function updateCanteenAbout(Request $request)
    {
        $request->validate([
           'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('canteen/hero', 'public');
            // Save image path to database
        }
        
        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());
        
        return redirect()->route('admin.canteen.about')->with('success', 'About section updated successfully');
    }
    

    /**
     * Show school Content Management
     */
    public function schoolHero()
    {
        return view('admin.school.hero');
    }

    /**
     * Update School Content
     */
    public function updateSchoolHero(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('school/hero', 'public');
            // Save image path to database
        }
        
        
        return redirect()->route('admin.school.hero')->with('success', 'Hero section updated successfully');
    }

    public function schoolAbout()
    {        
        return view('admin.school.about');
    }
    
    /**
     * Update About Section
     */
    public function updateSchoolAbout(Request $request)
    {
        $request->validate([
           'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('school/about', 'public');
            // Save image path to database
        }
        
        // Update about data in database
        // AboutSection::updateOrCreate(['id' => 1], $request->all());
        
        return redirect()->route('admin.school.about')->with('success', 'About section updated successfully');
    }

 

        /**
     * Display Parents Hero Section form
     */
    public function parentsHero()
    {   
        return view('admin.parents.hero');
    }

    /**
     * Update Parents Hero Section
     */
    public function updateParentsHero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'main_title_font_size' => 'required|in:32,36,40,44,48',
            'subtitle' => 'required|string|max:1000',
            'subtitle_font_size' => 'required|in:16,18,20,24',
            'cta_button_1' => 'required|string|max:100',
            'cta_button_1_url' => 'required|url',
            'cta_button_2' => 'required|string|max:100',
            'cta_button_2_url' => 'required|url',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update content
        $content['main_title'] = $request->input('main_title');
        $content['main_title_font_size'] = $request->input('main_title_font_size');
        $content['subtitle'] = $request->input('subtitle');
        $content['subtitle_font_size'] = $request->input('subtitle_font_size');
        $content['cta_button_1'] = $request->input('cta_button_1');
        $content['cta_button_1_url'] = $request->input('cta_button_1_url');
        $content['cta_button_2'] = $request->input('cta_button_2');
        $content['cta_button_2_url'] = $request->input('cta_button_2_url');
        $content['bg_color'] = $request->input('bg_color');
        $content['is_active'] = true;

        // Save updated content


        return redirect()->route('admin.parents.hero')
            ->with('success', 'Hero section berhasil diperbarui!');
    }

    /**
     * Display Parents About Section form
     */
    public function parentsAbout()
    {
        
        return view('admin.parents.about');
    }

    /**
     * Update Parents About Section
     */
    public function updateParentsAbout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'section_title_font_size' => 'required|in:24,28,32,36',
            'section_description' => 'required|string|max:1000',
            'section_description_font_size' => 'required|in:14,16,18,20',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'layout_position' => 'required|in:image_left,image_right',
            'bg_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update content
        $content['section_title'] = $request->input('section_title');
        $content['section_title_font_size'] = $request->input('section_title_font_size');
        $content['section_description'] = $request->input('section_description');
        $content['section_description_font_size'] = $request->input('section_description_font_size');
        $content['layout_position'] = $request->input('layout_position');
        $content['bg_color'] = $request->input('bg_color');
        $content['is_active'] = $request->has('is_active') ? true : false;

     

        return redirect()->route('admin.parents.about')
            ->with('success', 'About section berhasil diperbarui!');
    }

    // Features Section
public function parentsFeatures()
{

    return view('admin.parents.features');
}

public function updateParentsFeatures(Request $request)
{
    $request->validate([
        'section_title' => 'required|string|max:255',
        'section_title_font_size' => 'required|integer|min:12|max:48',
        'section_description' => 'required|string|max:1000',
        'section_description_font_size' => 'required|integer|min:12|max:24',
        'bg_color' => 'required|string|max:7',
    ]);

    return redirect()->route('admin.parents.features')->with('success', 'Features section berhasil diperbarui!');
}

    /**
     * Show flexycazh Menu Management
     */
    public function flexycazhHero()
    {
        return view('admin.flexycazh.hero');
    }

     public function updateFlexycazhHero(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('flexycazh/hero', 'public');
            // Save image path to database
        }
        
        
        return redirect()->route('admin.flexycazh.hero')->with('success', 'Hero section updated successfully');
    }

    /**
     * Upload image via AJAX
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'section' => 'required|string|in:hero,about,download',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file format or size too large.'
            ], 400);
        }

        $section = $request->input('section');
        $image = $request->file('image');
        
        $path = $image->store("edu/{$section}", 'public');
        
        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully!',
            'path' => $path,
            'url' => asset('storage/' . $path)
        ]);
    }

    /**
     * Get current content settings
     */
    public function getContentSettings()
    {
        // Here you would typically fetch from database
        $settings = [
            'hero' => [
                'title' => 'Cards Edu',
                'subtitle' => 'Transformasi sekolah jadi digital. Bisa dengan Cards Edu, platform yang mudah digunakan untuk berbagai kebutuhan sekolah.',
                'background_color' => '#1B7A7A',
                'image' => null
            ],
            'about' => [
                'title' => 'Apa itu Cards Edu?',
                'description' => 'Cards Edu adalah produk dari PT Cards Technology berupa yang dirancang khusus untuk kebutuhan sekolah digital. Platform ini menawarkan berbagai fitur yang memudahkan pengelolaan sekolah baik bagi guru, murid, maupun orang tua, serta memberikan pengalaman belajar yang lebih efisien dan praktis dan efisien.',
                'image' => null
            ],
            'features' => [
                'title' => 'Fitur Fitur Cards Edu',
                'items' => [
                    [
                        'title' => 'Jadwal Otomatis',
                        'description' => 'Sistem otomatis yang dapat mempermudah kegiatan sekolah dan memudahkan pengelolaan sekolah dengan mudah.'
                    ]
                ]
            ],
            'download' => [
                'title' => '',
                'description' => 'Mulai perjalanan belajar digital Anda sekarang! Download aplikasi Cards Edu dan nikmati kemudahan belajar yang tak terbatas.',
                'background_color' => '#1B7A7A',
                'image' => null
            ],
            'global' => [
                'primary_color' => '#1B7A7A',
                'secondary_color' => '#3B82F6',
                'font_family' => 'segoe-ui'
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }
}