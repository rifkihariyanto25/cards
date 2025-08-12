<?php

namespace App\Models\Edu;

use Illuminate\Database\Eloquent\Model;

class EduHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
