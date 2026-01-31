<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->paginate(20);
        return view('admin.donations.index', compact('donations'));
    }

    public function verify($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update(['status' => 'completed']);
        return back()->with('success', 'Donation verified successfully.');
    }

    public function reject($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update(['status' => 'failed']);
        return back()->with('error', 'Donation marked as rejected.');
    }
}
