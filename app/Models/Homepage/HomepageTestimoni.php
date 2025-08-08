<?php

namespace App\Models\Homepage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageTestimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'profesi',
        'foto',
        'komentar'
    ];
}
