<?php

namespace App\Models\Canteen;

use Illuminate\Database\Eloquent\Model;

class CanteenHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
