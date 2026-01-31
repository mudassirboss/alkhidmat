<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        $stories = [
            [
                'title' => 'Life-Saving Medical Camp Serves 500+ Patients in Muzaffargarh',
                'slug' => 'medical-camp-serves-500-patients',
                'category' => 'Healthcare',
                'excerpt' => 'Free medical camp provides essential healthcare services to underprivileged communities, treating over 500 patients in a single day.',
                'image' => 'news-medical-camp.png',
                'published_at' => '2026-01-25',
                'read_time' => '4 min read',
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
            [
                'title' => 'Scholarship Program Transforms Lives of 50 Orphan Students',
                'slug' => 'scholarship-program-orphan-students',
                'category' => 'Education',
                'excerpt' => 'With your support, 50 orphaned children received full scholarships, opening doors to bright futures in education.',
                'image' => 'news-scholarship.png',
                'published_at' => '2026-01-20',
                'read_time' => '5 min read',
                'author' => 'Ayesha Khan',
                'content' => '<p>Education is the key to breaking the cycle of poverty. We are proud to announce that 50 brilliant orphan students have been awarded full scholarships...</p>'
            ],
            [
                'title' => 'Emergency Relief Reaches 1,000 Flood-Affected Families',
                'slug' => 'emergency-relief-flood-families',
                'category' => 'Relief',
                'excerpt' => 'Swift response delivers food packages, clean water, and shelter materials to families devastated by recent floods.',
                'image' => 'news-flood-relief.png',
                'published_at' => '2026-01-15',
                'read_time' => '6 min read',
                'author' => 'Team Alkhidmat',
                'content' => '<p>Flash floods devastated several villages. Our emergency response team was on the ground within hours...</p>'
            ],
            [
                'title' => 'Clean Water Initiative Brings Safe Drinking Water to 20 Villages',
                'slug' => 'clean-water-initiative-20-villages',
                'category' => 'Water',
                'excerpt' => 'Installation of 20 solar-powered water wells transforms health outcomes for thousands of rural residents.',
                'image' => 'news-water-wells.png',
                'published_at' => '2026-01-10',
                'read_time' => '5 min read',
                'author' => 'Engr. Bilal Ahmed',
                'content' => '<p>Access to clean water is a basic human right. We successfully inaugurated 20 new solar-powered filtration plants...</p>'
            ],
            [
                'title' => 'Food Distribution Drive Feeds 2,000 Families During Ramadan',
                'slug' => 'ramadan-food-distribution-2000-families',
                'category' => 'Relief',
                'excerpt' => 'Generous donors enable distribution of nutritious food packages to struggling families throughout the holy month.',
                'image' => 'news-ramadan-food.png',
                'published_at' => '2026-01-05',
                'read_time' => '4 min read',
                'author' => 'Community Team',
                'content' => '<p>Ramadan is a month of giving. Our food drive ensured that 2,000 families had nutritious meals for Suhoor and Iftar...</p>'
            ],
            [
                'title' => 'From Orphanage to University: Ahmed\'s Inspiring Journey',
                'slug' => 'ahmed-orphan-to-university',
                'category' => 'Success Story',
                'excerpt' => 'Meet Ahmed, who went from Alkhidmat Aghosh orphan care to becoming a medical student, thanks to your support.',
                'image' => 'news-medical-camp.png',
                'published_at' => '2025-12-28',
                'read_time' => '7 min read',
                'author' => 'Storyteller',
                'content' => '<p>Ahmed lost his father at a young age. He joined Alkhidmat Aghosh Home where he received care, education, and mentorship...</p>'
            ]
        ];

        foreach ($stories as $story) {
            Post::updateOrCreate(
                ['slug' => $story['slug']],
                $story
            );
        }
    }
}
