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
