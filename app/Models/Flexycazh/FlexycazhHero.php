<?php

namespace App\Models\Flexycazh;

use Illuminate\Database\Eloquent\Model;

class FlexycazhHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
