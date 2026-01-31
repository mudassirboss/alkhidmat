<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'Service to Humanity with Integrity',
                'subtitle' => 'Alkhidmat Foundation Muzaffargarh - Transforming lives since 1990 through compassion.',
                'button_text' => 'Donate Now',
                'button_link' => '#donate',
                'secondary_button_text' => 'Explore Programs',
                'secondary_button_link' => '#programs',
                'image_path' => 'slider-humanitarian.png',
                'layout' => 'center',
                'order_index' => 1
            ],
            [
                'title' => 'Empowering Through Education',
                'subtitle' => '60 schools nationwide • 1,569 scholarships awarded • Bano Qabil IT training.',
                'button_text' => 'Support Education',
                'button_link' => '#programs',
                'secondary_button_text' => 'Learn More',
                'secondary_button_link' => '#',
                'image_path' => 'slider-education.png',
                'layout' => 'split-right', // Showcase split layout
                'order_index' => 2
            ],
            [
                'title' => 'Healing with Compassion',
                'subtitle' => '57 hospitals • 296 ambulances • Free medical care for those who need it most.',
                'button_text' => 'Support Healthcare',
                'button_link' => '#donate',
                'secondary_button_text' => 'Our Clinics',
                'secondary_button_link' => '#',
                'image_path' => 'slider-medical.png',
                'layout' => 'split-left', // Showcase split left
                'order_index' => 3
            ],
            [
                'title' => 'Clean Water, Healthy Lives',
                'subtitle' => '25,809 water projects completed • Solar-powered wells • Bringing safe drinking water.',
                'button_text' => 'Fund a Well',
                'button_link' => '#donate',
                'secondary_button_text' => 'WASH Projects',
                'secondary_button_link' => '#',
                'image_path' => 'slider-water.png',
                'layout' => 'center',
                'order_index' => 4
            ]
        ];

        foreach ($sliders as $slide) {
            Slider::create($slide);
        }
    }
}
