<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{

    use HasFactory;

    protected $fillable = [
        'date',
        'name',
        'preview_image',
        'full_image',
        'shortDesc',
        'desc',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
