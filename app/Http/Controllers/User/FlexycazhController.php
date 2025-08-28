<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhPengajuan;
use App\Models\Flexycazh\FlexycazhFeature;
use App\Models\Flexycazh\FlexycazhHero;
use App\Models\Flexycazh\FlexycazhTutorial;
use Illuminate\Support\Facades\Storage;

class FlexycazhController extends Controller
{
    /**
     * Menampilkan halaman FlexyCazh
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $heroData = FlexycazhHero::first();
        $features = FlexycazhFeature::all();
        $tutorials = FlexycazhTutorial::first();

        // Tambahkan variabel yang dibutuhkan di view
        $gradients = [
            'from-cyan-500 to-blue-600',
            'from-green-500 to-emerald-600',
            'from-purple-500 to-pink-600',
            'from-orange-500 to-red-600',
            'from-indigo-500 to-purple-600',
            'from-pink-500 to-rose-600'
        ];

        $defaultIcons = [
            'fa-bolt',
            'fa-percentage',
            'fa-calendar-alt',
            'fa-shield-alt',
            'fa-chart-line',
            'fa-users'
        ];

        // Kirim ke view
        return view('user.flexy', compact('heroData', 'features', 'tutorials', 'gradients', 'defaultIcons'));
    }

    /**
     * Menyimpan data pengajuan FlexyCazh
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePengajuan(Request $request)
    {
        $request->validate([
            'nama_partner' => 'required|string|max:255',
            'jenis_partner' => 'required|string|max:255',
            'nama_pic' => 'required|string|max:255',
            'nomor_hp_pic' => 'required|string|max:20',
            'kebutuhan' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:1',
            'tenor' => 'required|string|max:255',
        ]);

        try {
            // Simpan data pengajuan
            FlexycazhPengajuan::simpanPengajuan($request->all());

            return redirect()->back()->with('success', 'Pengajuan FlexyCazh berhasil dikirim. Tim kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pengajuan. Silakan coba lagi.')->withInput();
        }
    }
}
