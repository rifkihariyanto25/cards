<?php

namespace App\Models\Parents;

use Illuminate\Database\Eloquent\Model;

class ParentsAbout extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'title_font_size',
        'subtitle_font_size',
        'cover_image'
    ];
}
