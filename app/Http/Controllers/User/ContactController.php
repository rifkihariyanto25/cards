<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Tambahkan ini jika diperlukan nanti

class ContactController extends Controller
{

    public function index()
    {
        // SALAH jika file ada di dalam folder 'user'
        // return view('contact'); 

        // BENAR karena memberitahu Laravel untuk mencari di dalam folder 'user'
        return view('user.contact');
    }
}
