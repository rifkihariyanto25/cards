<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_font_size',

        // Konten 1
        'content_1_title',
        'content_1_title_font_size',
        'content_1_subtitle',
        'content_1_subtitle_font_size',
        'content_1_icon',

        // Konten 2
        'content_2_title',
        'content_2_title_font_size',
        'content_2_subtitle',
        'content_2_subtitle_font_size',
        'content_2_icon',

        // Konten 3
        'content_3_title',
        'content_3_title_font_size',
        'content_3_subtitle',
        'content_3_subtitle_font_size',
        'content_3_icon',

        // Konten 4
        'content_4_title',
        'content_4_title_font_size',
        'content_4_subtitle',
        'content_4_subtitle_font_size',
        'content_4_icon',
    ];
}
