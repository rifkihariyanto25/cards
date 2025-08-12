<?php

namespace App\Models\Edu;

use Illuminate\Database\Eloquent\Model;

class EduFeature extends Model
{
    protected $table = 'homepage_products';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
    ];
}
