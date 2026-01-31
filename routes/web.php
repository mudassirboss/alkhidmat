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

Route::get('/news', function () {
    // Sample news/success stories data (would come from database in production)
    $stories = [
        [
            'id' => 1,
            'title' => 'Life-Saving Medical Camp Serves 500+ Patients in Muzaffargarh',
            'slug' => 'medical-camp-serves-500-patients',
            'category' => 'Healthcare',
            'excerpt' => 'Free medical camp provides essential healthcare services to underprivileged communities, treating over 500 patients in a single day.',
            'image' => 'news-medical-camp.png',
            'date' => '2026-01-25',
            'read_time' => '4 min read',
        ],
        [
            'id' => 2,
            'title' => 'Scholarship Program Transforms Lives of 50 Orphan Students',
            'slug' => 'scholarship-program-orphan-students',
            'category' => 'Education',
            'excerpt' => 'With your support, 50 orphaned children received full scholarships, opening doors to bright futures in education.',
            'image' => 'news-scholarship.png',
            'date' => '2026-01-20',
            'read_time' => '5 min read',
        ],
        [
            'id' => 3,
            'title' => 'Emergency Relief Reaches 1,000 Flood-Affected Families',
            'slug' => 'emergency-relief-flood-families',
            'category' => 'Relief',
            'excerpt' => 'Swift response delivers food packages, clean water, and shelter materials to families devastated by recent floods.',
            'image' => 'news-flood-relief.png',
            'date' => '2026-01-15',
            'read_time' => '6 min read',
        ],
        [
            'id' => 4,
            'title' => 'Clean Water Initiative Brings Safe Drinking Water to 20 Villages',
            'slug' => 'clean-water-initiative-20-villages',
            'category' => 'Water',
            'excerpt' => 'Installation of 20 solar-powered water wells transforms health outcomes for thousands of rural residents.',
            'image' => 'news-water-wells.png',
            'date' => '2026-01-10',
            'read_time' => '5 min read',
        ],
        [
            'id' => 5,
            'title' => 'Food Distribution Drive Feeds 2,000 Families During Ramadan',
            'slug' => 'ramadan-food-distribution-2000-families',
            'category' => 'Relief',
            'excerpt' => 'Generous donors enable distribution of nutritious food packages to struggling families throughout the holy month.',
            'image' => 'news-ramadan-food.png',
            'date' => '2026-01-05',
            'read_time' => '4 min read',
        ],
        [
            'id' => 6,
            'title' => 'From Orphanage to University: Ahmed\'s Inspiring Journey',
            'slug' => 'ahmed-orphan-to-university',
            'category' => 'Success Story',
            'excerpt' => 'Meet Ahmed, who went from Alkhidmat Aghosh orphan care to becoming a medical student, thanks to your support.',
            'image' => 'news-ahmed-story.png',
            'date' => '2025-12-28',
            'read_time' => '7 min read',
        ],
    ];
    
    return view('news', ['stories' => $stories]);
})->name('news');

Route::get('/news/{slug}', function ($slug) {
    // Sample detail data (would come from database in production)
    $stories = [
        'medical-camp-serves-500-patients' => [
            'id' => 1,
            'title' => 'Life-Saving Medical Camp Serves 500+ Patients in Muzaffargarh',
            'category' => 'Healthcare',
            'date' => '2026-01-25',
            'read_time' => '4 min read',
            'image' => 'news-medical-camp.png',
            'author' => 'Dr. Hassan Ali',
            'content' => '
                <p>On January 25th, 2026, Alkhidmat Foundation Muzaffargarh organized a massive free medical camp in the heart of rural Muzaffargarh, providing essential healthcare services to over 500 patients in a single day.</p>
                
                <h3>Comprehensive Healthcare Services</h3>
                <p>The medical camp offered a wide range of services including general medical consultations, pediatric care, gynecological consultations, dental checkups, and free medicines. Our team of 15 volunteer doctors and 20 paramedics worked tirelessly from dawn to dusk.</p>
                
                <h3>Impact on the Community</h3>
                <p>Many patients traveled from remote villages, some walking for hours. "I haven\'t seen a doctor in three years," shared Fatima Bibi, a 65-year-old patient. "Today, I received free consultation, medicines, and hope. May Allah reward Alkhidmat."</p>
                
                <h3>Key Statistics:</h3>
                <ul>
                    <li>500+ patients treated</li>
                    <li>15 volunteer doctors</li>
                    <li>PKR 200,000 worth of free medicines distributed</li>
                    <li>50 patients referred for specialized treatment</li>
                </ul>
                
                <p>This medical camp was made possible through the generous donations of supporters like you. Your zakat and sadaqah are directly transforming lives and providing dignity to those who need it most.</p>
            ',
        ],
        // Add more story details as needed
    ];
    
    $story = $stories[$slug] ?? abort(404);
    
    return view('news-detail', ['story' => $story]);
})->name('news.detail');
