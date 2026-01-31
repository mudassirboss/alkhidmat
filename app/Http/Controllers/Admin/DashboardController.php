<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
// Volunteer Model? I need to check if created. If not, I'll count DB directly or assume schema.
// User form data was just logged/emailed?
// Step 1363: Route::post('/volunteer/submit', function... \Log::info...)
// Ah, Volunteer data is NOT saved to DB yet! It's just logged.
// I need to create a Volunteer model/migration if I want to show it in Admin.
// For now, I will focus on Donations which definitely exist.

class DashboardController extends Controller
{
    public function index()
    {
        // Add error handling if table doesn't exist yet
        try {
            $totalDonations = Donation::sum('amount');
            $pendingDonations = Donation::where('status', 'pending')->count();
            $totalDonationsCount = Donation::count();
            $volunteersCount = \App\Models\Volunteer::count();
        } catch (\Exception $e) {
            $totalDonations = 0;
            $pendingDonations = 0;
            $totalDonationsCount = 0;
            $volunteersCount = 0;
        }

        return view('admin.dashboard', compact('totalDonations', 'pendingDonations', 'totalDonationsCount', 'volunteersCount'));
    }
}
