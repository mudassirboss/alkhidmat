<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            'site_title' => 'Alkhidmat Foundation Muzaffargarh',
            'contact_address' => 'Alkhidmat Complex, Multan Road, Muzaffargarh, Punjab, Pakistan',
            'contact_phone' => '+92 300 1234567',
            'contact_phone_2' => '+92 66 1234567',
            'contact_email' => 'info@alkhidmatmzg.org',
            'social_facebook' => 'https://facebook.com/alkhidmatmzg',
            'social_twitter' => 'https://twitter.com/alkhidmatmzg',
            'social_instagram' => 'https://instagram.com/alkhidmatmzg',
            'social_youtube' => 'https://youtube.com/alkhidmatmzg',
            'meta_description' => 'Alkhidmat Foundation Muzaffargarh - Service to Humanity with Integrity',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
