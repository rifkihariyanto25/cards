<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class SchoolHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
