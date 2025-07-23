<?php

namespace Database\Seeders;

use App\Models\OurImpact;
use App\Models\PageSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PageSetting::firstOrCreate(['page_id' => 'about-us']);
        PageSetting::firstOrCreate(['page_id' => 'services']);
        PageSetting::firstOrCreate(['page_id' => 'blog']);
        PageSetting::firstOrCreate(['page_id' => 'contact-us']);
        PageSetting::firstOrCreate(['page_id' => 'testimonials']);
        //Our Impact
        OurImpact::firstOrCreate([
            'title' => 'Our Impact',
        ]);
    }
}
