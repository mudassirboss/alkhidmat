<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/volunteer', function () {
    return view('volunteer');
})->name('volunteer');

Route::post('/volunteer/submit', function (Illuminate\Http\Request $request) {
    // Validate the form data
    $validated = $request->validate([
        'volunteer_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'country' => 'required|string|max:100',
        'mobile_no' => 'required|string|max:15',
        'gender' => 'required|in:Male,Female',
        'date_of_birth' => 'required|date',
        'district' => 'nullable|string|max:100',
        'blood_group' => 'nullable|string|max:10',
        'area_of_interest' => 'nullable|string|max:255',
        'current_institute' => 'nullable|string|max:255',
        'reference_code' => 'nullable|string|max:100',
        'has_disability' => 'nullable|boolean',
        'alkhidmat_digital_team' => 'nullable|boolean',
        'why_interested' => 'nullable|string|max:1000',
    ]);
    
    // For now, just log the data (you can save to database later)
    \Log::info('Volunteer Registration:', $validated);
    
    return redirect()->route('volunteer')->with('success', 'Thank you for registration! You will be added to relevant WhatsApp group shortly. Please check your mobile for profile completion link.');
})->name('volunteer.submit');
