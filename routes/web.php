<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('home');
})->name('home');

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

    // Map form fields to DB columns
    Volunteer::create([
        'name' => $request->volunteer_name,
        'email' => $request->email,
        'country' => $request->country,
        'mobile_no' => $request->mobile_no,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'district' => $request->district,
        'blood_group' => $request->blood_group,
        'area_of_interest' => $request->area_of_interest,
        'current_institute' => $request->current_institute,
        'reference_code' => $request->reference_code,
        'has_disability' => $request->has('has_disability'),
        'alkhidmat_digital_team' => $request->has('alkhidmat_digital_team'),
        'why_interested' => $request->why_interested,
    ]);
    
    return redirect()->back()->with('success', 'Thank you for registering as a volunteer!');
})->name('volunteer.submit');

// News Routes
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.detail');


// Donation Routes
Route::get('/donate', [DonationController::class, 'index'])->name('donate.index');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
Route::get('/donate/thank-you', [DonationController::class, 'thankYou'])->name('donate.thank-you');

// Program Routes
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Contact Routes
use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Admin Routes
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    });

    // Authenticated Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Donations
        Route::get('/donations', [App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donations.index');
        Route::get('/donations/{id}/verify', [App\Http\Controllers\Admin\DonationController::class, 'verify'])->name('donations.verify');
        Route::get('/donations/{id}/reject', [App\Http\Controllers\Admin\DonationController::class, 'reject'])->name('donations.reject');
        
        // Volunteers
        Route::get('/volunteers', [App\Http\Controllers\Admin\VolunteerController::class, 'index'])->name('volunteers.index');
    });
});
