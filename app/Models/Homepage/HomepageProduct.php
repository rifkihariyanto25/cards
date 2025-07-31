<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class HomepageProduct extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'nama',
        'gambar',
        'link',
        'deskripsi',
        'status'
    ];
}
