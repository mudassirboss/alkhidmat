<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display the donation page.
     */
    public function index()
    {
        return view('donate.index');
    }

    /**
     * Process the donation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100',
            'amount_final' => 'required|numeric|min:100', // Use this as the actual amount
            'donation_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'purpose' => 'nullable|string',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string',
        ]);

        // Use amount_final if available (from hidden field which handles custom amount logic)
        $amount = $request->amount_final ?? $request->amount;

        $donation = \App\Models\Donation::create([
            'amount' => $amount,
            'donation_type' => $request->donation_type,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'purpose' => $request->purpose,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'status' => 'pending', // Pending manual verification
        ]);

        return redirect()->route('donate.thank-you')->with('donation_id', $donation->id);
    }

    public function thankYou()
    {
        return view('donate.thank-you');
    }
}
