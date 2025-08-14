<?php

namespace App\Models\Canteen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanteenFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'status',
    ];
}