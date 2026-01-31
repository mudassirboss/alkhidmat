<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_link',
        'secondary_button_text',
        'secondary_button_link',
        'image_path',
        'background_image_path',
        'order_index',
        'is_active',
        'layout'
    ];
}
