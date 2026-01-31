<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'country',
        'mobile_no',
        'gender',
        'date_of_birth',
        'district',
        'blood_group',
        'area_of_interest',
        'current_institute',
        'reference_code',
        'has_disability',
        'alkhidmat_digital_team',
        'why_interested'
    ];
}
