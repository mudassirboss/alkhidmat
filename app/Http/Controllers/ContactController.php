<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Process the contact form.
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // In a real application, you would send an email here.
        // For now, we'll just log it and redirect back.
        \Log::info('Contact Form Submission:', $validated);

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
    }
}
