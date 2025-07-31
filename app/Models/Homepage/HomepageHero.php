<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class HomepageHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
