<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'currency',
        'donation_type',
        'name',
        'email',
        'phone',
        'purpose',
        'payment_method',
        'transaction_id', // For online payments if any
        'receipt_path',   // For bank transfer proof
        'status', // pending, verified, rejected
        'admin_notes',
    ];
}
