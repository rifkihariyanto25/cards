<?php

namespace App\Models\Flexycazh;

use Illuminate\Database\Eloquent\Model;

class FlexycazhTutorial extends Model
{
    protected $table = 'flexycazh_tutorials';

    protected $fillable = [
        'title',
        'title_font_size',
        'content_1_title',
        'content_1_title_font_size',
        'content_1_subtitle',
        'content_1_subtitle_font_size',
        'content_2_title',
        'content_2_title_font_size',
        'content_2_subtitle',
        'content_2_subtitle_font_size',
        'content_3_title',
        'content_3_title_font_size',
        'content_3_subtitle',
        'content_3_subtitle_font_size',
    ];
}
