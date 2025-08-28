<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhHero;
use App\Models\Flexycazh\FlexycazhFeature;
use App\Models\Flexycazh\FlexycazhTutorial;
use App\Models\Flexycazh\FlexycazhPengajuan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Tambahkan untuk debugging

class FlexycazhController extends Controller
{
    // Tampilkan halaman FlexyCazh
    public function index()
    {
        $heroData = FlexycazhHero::first();
        $features = FlexycazhFeature::all();
        $tutorials = FlexycazhTutorial::first();

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

        return view('user.flexy', compact('heroData', 'features', 'tutorials', 'gradients', 'defaultIcons'));
    }

    // Simpan pengajuan
    public function store(Request $request)
    {
        // Debug: Log semua data yang masuk
        Log::info('FlexyCazh Form Data:', $request->all());

        try {
            // Validasi data
            $validated = $request->validate([
                'nama_partner' => 'required|string|max:255',
                'jenis_partner' => 'required|string|in:Sekolah,Klinik,Perusahaan',
                'nama_pic' => 'required|string|max:255',
                'nomor_hp_pic' => 'required|string|max:20',
                'kebutuhan' => 'required|string|max:255',
                'nominal' => 'required|string', // Ubah ke string dulu
                'tenor' => 'required|string|in:3 Bulan,6 Bulan,12 Bulan',
            ]);

            // Bersihkan format nominal (hapus titik/koma dari format currency)
            $cleanNominal = preg_replace('/[^\d]/', '', $validated['nominal']);
            $validated['nominal'] = (float) $cleanNominal; // Ubah ke float untuk decimal

            // Validasi nominal setelah dibersihkan
            if ($validated['nominal'] < 1000000 || $validated['nominal'] > 1000000000) {
                return redirect()->back()
                    ->with('error', 'Nominal harus antara Rp 1.000.000 - Rp 1.000.000.000')
                    ->withInput();
            }

            // Simpan ke database
            $pengajuan = FlexycazhPengajuan::create([
                'nama_partner' => $validated['nama_partner'],
                'jenis_partner' => $validated['jenis_partner'],
                'nama_pic' => $validated['nama_pic'],
                'nomor_hp_pic' => $validated['nomor_hp_pic'],
                'kebutuhan' => $validated['kebutuhan'],
                'nominal' => $validated['nominal'],
                'tenor' => $validated['tenor'],
                'status' => 'pending'
            ]);

            Log::info('FlexyCazh Pengajuan Created:', $pengajuan->toArray());

            return redirect()->back()->with('success', 'Pengajuan FlexyCazh berhasil dikirim. Tim kami akan menghubungi Anda dalam 24 jam.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Error:', $e->errors());
            return redirect()->back()->withErrors($e)->withInput();
        } catch (\Exception $e) {
            Log::error('FlexyCazh Store Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.')
                ->withInput();
        }
    }
}
