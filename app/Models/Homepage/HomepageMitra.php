<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Model;

class HomepageMitra extends Model
{
    protected $table = 'homepage_mitras';
    protected $fillable = [
        'nama',
        'logo'
    ];
}
