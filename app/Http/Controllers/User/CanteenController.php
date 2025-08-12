<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canteen\CanteenHero;
use App\Models\Canteen\CanteenAbout;

class CanteenController extends Controller
{
    /**
     * Display the canteen page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data hero dan about dari model
        $hero = CanteenHero::first();
        $about = CanteenAbout::first();
        
        // Jika data belum ada, buat objek kosong untuk menghindari error null
        if (!$hero) {
            $hero = new CanteenHero();
            $hero->title = 'Uang Saku Digital: Solusi Cashless yang Aman & Terkontrol untuk Transaksi Kantin.';
            $hero->subtitle = 'Terhubung dengan akun orang tua, semua transaksi terpantau real-time & bebas dari risiko kehilangan uang tunai.';
            $hero->title_font_size = '24px';
            $hero->subtitle_font_size = '16px';
            $hero->cover_image = null;
        }
        
        if (!$about) {
            $about = new CanteenAbout();
            $about->title = 'Apa itu Cards E-Canteen?';
            $about->subtitle = 'E-Canteen adalah solusi kantin digital dari CARDS yang dirancang untuk mempermudah transaksi di lingkungan sekolah, kampus, atau institusi. Dengan sistem ini, proses jual beli di kantin menjadi lebih cepat, aman, dan tanpa uang tunai, sehingga membantu membentuk budaya cashless sekaligus mendukung efisiensi operasional.';
            $about->title_font_size = '24px';
            $about->subtitle_font_size = '16px';
            $about->cover_image = null;
        }
        
        // Mengirim data ke view
        return view('user.canteen', compact('hero', 'about'));
    }
}
