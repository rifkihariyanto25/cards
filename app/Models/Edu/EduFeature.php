<?php

namespace App\Models\Edu;

use Illuminate\Database\Eloquent\Model;

class EduFeature extends Model
{
    protected $table = 'edu_features';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'status',
    ];
}
