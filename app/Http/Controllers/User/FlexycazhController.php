<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flexycazh\FlexycazhPengajuan;

class FlexycazhController extends Controller
{
    /**
     * Menampilkan halaman FlexyCazh
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        return view('user.flexy');
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