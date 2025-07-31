<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content_1_title',
        'content_1_subtitle',
        'content_1_icon',
        'content_2_title',
        'content_2_subtitle',
        'content_2_icon',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
