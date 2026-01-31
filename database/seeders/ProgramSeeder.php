<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            'healthcare' => [
                'title' => 'Healthcare Services',
                'subtitle' => 'Providing Quality Medical Care to the Underserved',
                'description' => 'Alkhidmat Healthcare services are committed to ensuring that even the most vulnerable members of society have access to quality medical treatment. From free medical camps to specialized hospitals, we bridge the gap in healthcare access.',
                'image_hero' => 'health_services_1769859459650.png', 
                'stats' => [
                    ['label' => 'Patients Treated', 'value' => '500,000+'],
                    ['label' => 'Hospitals', 'value' => '52'],
                    ['label' => 'Medical Camps', 'value' => '1,200+'],
                ],
                'features' => [
                    'Free Medical Camps in rural areas',
                    'Mother & Child Healthcare Centers',
                    'Ambulance Service network',
                    'Pharmacy & Diagnostic Tests'
                ]
            ],
            'education' => [
                'title' => 'Education Program',
                'subtitle' => 'Empowering Future Generations Through Knowledge',
                'description' => 'We believe education is a fundamental right. Our Alfalah Scholarship scheme and schools provide quality education to orphans and underprivileged children, giving them a chance at a brighter future.',
                'image_hero' => 'education_program_1769859479050.png',
                'stats' => [
                    ['label' => 'Students Supported', 'value' => '25,000+'],
                    ['label' => 'Scholarships', 'value' => '5,000+'],
                    ['label' => 'Schools', 'value' => '45'],
                ],
                'features' => [
                    'Alfalah Scholarship Scheme',
                    'Child Protection Centers',
                    'Skill Development Workshops',
                    'School Supplies Distribution'
                ]
            ],
            'disaster-management' => [
                'title' => 'Disaster Management',
                'subtitle' => 'First Responders in Times of Crisis',
                'description' => 'Alkhidmat is renowned for its rapid response to natural disasters. From floods to earthquakes, our teams are the first to reach affected areas with rescue operations, medical aid, food, and shelter.',
                'image_hero' => 'hero_humanitarian_work_1769859411641.png',
                'stats' => [
                    ['label' => 'Relief Operations', 'value' => '1,500+'],
                    ['label' => 'Families Rescued', 'value' => '50,000+'],
                    ['label' => 'Tents Distributed', 'value' => '25,000+'],
                ],
                'features' => [
                    'Emergency Rescue Service',
                    'Tents & Shelter Distribution',
                    'Cooked Food & Dry Ration',
                    'Medical Relief Camps'
                ]
            ],
            'orphan-care' => [
                'title' => 'Orphan Care (Aghosh)',
                'subtitle' => 'A Home and Hope for Orphan Children',
                'description' => 'The Aghosh program provides a loving home, education, and mentorship to orphan children. We ensure they grow up in a nurturing environment with all the opportunities they deserve.',
                'image_hero' => 'orphan_care_service_1769859431570.png',
                'stats' => [
                    ['label' => 'Orphans Sponsored', 'value' => '18,000+'],
                    ['label' => 'Aghosh Homes', 'value' => '15'],
                    ['label' => 'Family Support', 'value' => '10,000+'],
                ],
                'features' => [
                    'Full Sponsorship (Food, Education, Health)',
                    'Aghosh Boarding Homes',
                    'Character Building & Mentorship',
                    'Recreational Activities'
                ]
            ],
            'clean-water' => [
                'title' => 'Clean Water Projects',
                'subtitle' => 'Quenching Thirst, Saving Lives',
                'description' => 'Water is life. We install hand pumps, water filtration plants, and gravity flow schemes in water-scarce areas to provide clean and safe drinking water to thousands of families.',
                'image_hero' => 'news-water-wells.png',
                'stats' => [
                    ['label' => 'Water Projects', 'value' => '3,500+'],
                    ['label' => 'Beneficiaries', 'value' => '1.2M+'],
                    ['label' => 'Filtration Plants', 'value' => '120'],
                ],
                'features' => [
                    'Community Hand Pumps',
                    'Solar Powered Water Schemes',
                    'Water Filtration Plants',
                    'Hygiene Awareness Campaigns'
                ]
            ],
            'community-services' => [
                'title' => 'Community Services',
                'subtitle' => 'Strengthening The Social Fabric',
                'description' => 'From winter relief packages to prisoner welfare and mosque construction, our community services address the diverse needs of society to build a stronger, more resilient community.',
                'image_hero' => 'hero_humanitarian_work_1769859411641.png',
                'stats' => [
                    ['label' => 'Families Served', 'value' => '100,000+'],
                    ['label' => 'Volunteers', 'value' => '5,000+'],
                    ['label' => 'Projects', 'value' => '500+'],
                ],
                'features' => [
                    'Winter Relief Drive',
                    'Qurbani Meat Distribution',
                    'Prisoner Welfare',
                    'Mosque Construction Support'
                ]
            ]
        ];

        foreach ($programs as $slug => $data) {
            Program::updateOrCreate(
                ['slug' => $slug],
                array_merge($data, ['slug' => $slug])
            );
        }
    }
}
