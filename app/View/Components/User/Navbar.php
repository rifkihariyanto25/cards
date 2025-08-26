<?php

namespace App\View\Components\User;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route; // <-- Tambahkan ini
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Nama rute yang sedang aktif.
     *
     * @var string
     */
    public $currentRoute;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Secara otomatis mendapatkan nama rute yang sedang diakses
        $this->currentRoute = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.user.navbar');
    }
}
