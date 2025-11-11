<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use Carbon\Carbon;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertisements = [
            [
                'name' => 'Homepage Banner - English Urdu Dictionary',
                'position' => 'homepage_banner',
                'status' => 'active',
                'ad_code' => '<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 8px;">
                    <h3>English Urdu Dictionary</h3>
                    <p>Your comprehensive language learning companion</p>
                    <a href="https://example.com" style="background: white; color: #667eea; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Learn More</a>
                </div>'
            ],
            [
                'name' => 'Sidebar Advertisement - Language Learning',
                'position' => 'sidebar_ad',
                'status' => 'active',
                'ad_code' => '<div style="border: 2px solid #4CAF50; padding: 15px; border-radius: 5px; text-align: center;">
                    <h4 style="color: #4CAF50; margin: 0 0 10px 0;">Language Courses</h4>
                    <p style="margin: 0 0 15px 0; font-size: 14px;">Master English & Urdu</p>
                    <button style="background: #4CAF50; color: white; border: none; padding: 8px 16px; border-radius: 3px; cursor: pointer;">Enroll Now</button>
                </div>'
            ],
            [
                'name' => 'Footer Advertisement - Translation Services',
                'position' => 'footer_ad',
                'status' => 'active',
                'ad_code' => '<div style="background: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; text-align: center; border-radius: 4px;">
                    <strong>Professional Translation Services</strong><br>
                    <small>English ↔ Urdu | Fast & Accurate</small><br>
                    <a href="#" style="color: #007bff; text-decoration: none;">Get Quote →</a>
                </div>'
            ],
            [
                'name' => 'Header Advertisement - Mobile App',
                'position' => 'header_ad',
                'status' => 'active',
                'ad_code' => '<div style="background: #17a2b8; color: white; padding: 10px; text-align: center; font-size: 14px;">
                    📱 Download our Mobile App for Offline Access! 
                    <a href="#" style="color: #fff; text-decoration: underline; margin-left: 10px;">Download Now</a>
                </div>'
            ],
            [
                'name' => 'Content Top - Grammar Guide',
                'position' => 'content_top',
                'status' => 'active',
                'ad_code' => '<div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 5px; margin: 10px 0;">
                    <h5 style="color: #856404; margin: 0 0 5px 0;">📚 Grammar Guide Available!</h5>
                    <p style="margin: 0; color: #856404;">Improve your English and Urdu grammar skills</p>
                </div>'
            ],
            [
                'name' => 'Google AdSense Example',
                'position' => 'sidebar_ad',
                'status' => 'inactive',
                'ad_code' => '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1234567890123456"
                     data-ad-slot="1234567890"
                     data-ad-format="auto"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>'
            ]
        ];

        foreach ($advertisements as $ad) {
            Advertisement::create($ad);
        }
    }
}
