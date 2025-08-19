<?php

namespace App\Models\Flexycazh;

use Illuminate\Database\Eloquent\Model;

class FlexycazhFeature extends Model
{
    protected $table = 'flexycazh_features';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'status',
    ];
}
