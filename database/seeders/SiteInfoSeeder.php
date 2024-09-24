<?php

namespace Database\Seeders;

use App\Models\SiteInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $app_info = SiteInfo::query()->create(
            [
                'name_ar' => 'الصاعدي',
                'name_en' => 'Elsaedy',
                'logo' => 'assets/images/logo/logo.svg',
                'logo_footer' => 'assets/images/logo/logo.svg',
                'fav_icon' => 'assets/images/logo/logo.svg',
                'phone' => fake()->phoneNumber(),
                'whatsapp_phone' => fake()->phoneNumber(),
                'facebook' => '',
                'email' => '',
                'twitter' => '',
                'instagram' => '',

                // 'bank_account_num' => '',
                // 'bank_iban_num' => '',
                // 'bank_qr_image' => '',
                // 'google_play' => '',
                // 'apple_store' => '',
                // 'copy_right_ar' => '',
                // 'copy_right_en' => '',
                // 'commision_buy' => '' ,
                // 'commision_rent' => '' ,
                // 'honisty_ar' => '' ,
                // 'honisty_en' => '' ,
                // 'ad_conditions_ar' => '' ,
                // 'ad_conditions_en' => '' ,
            ]
        );
    }
}
