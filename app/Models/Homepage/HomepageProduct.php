<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class HomepageProduct extends Model
{
    protected $table = 'homepage_products';
    protected $fillable = [
        'nama',
        'gambar',
        'link',
        'deskripsi',
        // 'status'
    ];
    
    // Pastikan timestamps diaktifkan
    public $timestamps = true;
}
