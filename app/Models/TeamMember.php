<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'image_path',
        'hierarchy_level',
        'order_index',
        'social_links',
        'is_active',
        'is_in_leadership',
        'leadership_quote',
        'show_on_team_page',
    ];

    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean',
        'is_in_leadership' => 'boolean',
        'show_on_team_page' => 'boolean',
    ];
}
