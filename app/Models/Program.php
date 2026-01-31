<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'description',
        'image_hero',
        'stats',
        'features'
    ];

    protected $casts = [
        'stats' => 'array',
        'features' => 'array'
    ];
}
